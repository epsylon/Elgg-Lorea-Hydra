/**
 * @license
 * Copyright (C) 2014 KO GmbH <copyright@kogmbh.com>
 *
 * @licstart
 * The JavaScript code in this page is free software: you can redistribute it
 * and/or modify it under the terms of the GNU Affero General Public License
 * (GNU AGPL) as published by the Free Software Foundation, either version 3 of
 * the License, or (at your option) any later version.
 *
 * The code is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this code.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @licend
 * @source: http://www.webodf.org/
 * @source: https://github.com/kogmbh/WebODF/
 */


// This code was created by pieces of Viewer.JS and can surely be reduced some more.
// Idea is to not use Viewer.JS here, but to have custom code, for these reasons:
// * the features of WebODF library should be shown, not Viewer.JS
// * should also show as side-effect that custom UI is simple to do
// * have another way the WebODF API is used

function ODFViewer(url) {
    "use strict";

    // that should probably be provided by webodf
    function nsResolver(prefix) {
        var ns = {
            'draw' : "urn:oasis:names:tc:opendocument:xmlns:drawing:1.0",
            'presentation' : "urn:oasis:names:tc:opendocument:xmlns:presentation:1.0",
            'text' : "urn:oasis:names:tc:opendocument:xmlns:text:1.0",
            'office' : "urn:oasis:names:tc:opendocument:xmlns:office:1.0"
        };
        return ns[prefix] || console.log('prefix [' + prefix + '] unknown.');
    }

    var self = this,
        odfCanvas = null,
        odfElement = null,
        root = null,
        documentType = null,
        kScrollbarPadding = 40,
        kDefaultScale = 'auto',
        initialized = false,
        isSlideshow = false,
        viewerElement = document.getElementById('viewer'),
        canvasContainer = document.getElementById('canvasContainer'),
        overlayNavigator = document.getElementById('overlayNavigator'),
        pageSwitcher = document.getElementById('toolbarLeft'),
        scaleSelector = document.getElementById('scaleSelect'),
        toolbarRight = document.getElementById('toolbarRight'),
        pages = [],
        currentPage = null,
        touchTimer;



    this.isPresentation = function () {
        return documentType === 'presentation';
    };

    this.getWidth = function () {
        return odfElement.clientWidth;
    };

    this.getHeight = function () {
        return odfElement.clientHeight;
    };

    this.fitToWidth = function (width) {
        odfCanvas.fitToWidth(width);
    };

    this.fitToHeight = function (height) {
        odfCanvas.fitToHeight(height);
    };

    this.fitToPage = function (width, height) {
        odfCanvas.fitToContainingElement(width, height);
    };

    this.fitSmart = function (width) {
        odfCanvas.fitSmart(width);
    };

    // return a list of tuples (pagename, pagenode)
    function getPages() {
        var pageNodes = Array.prototype.slice.call(root.getElementsByTagNameNS(nsResolver('draw'), 'page')),
            pages  = [],
            i,
            tuple;

        for (i = 0; i < pageNodes.length; i += 1) {
            tuple = [
                pageNodes[i].getAttribute('draw:name'),
                pageNodes[i]
            ];
            pages.push(tuple);
        }
        return pages;
    };

    function selectScaleOption(value) {
        // Retrieve the options from the zoom level <select> element
        var options = scaleSelector.options,
            option,
            predefinedValueFound = false,
            i;

        for (i = 0; i < options.length; i += 1) {
            option = options[i];
            if (option.value !== value) {
                option.selected = false;
                continue;
            }
            option.selected = true;
            predefinedValueFound = true;
        }
        return predefinedValueFound;
    }

    function setScale(val, resetAutoSettings, noScroll) {
        if (val === self.getZoomLevel()) {
            return;
        }

        self.setZoomLevel(val);

        var event = document.createEvent('UIEvents');
        event.initUIEvent('scalechange', false, false, window, 0);
        event.scale = val;
        event.resetAutoSettings = resetAutoSettings;
        window.dispatchEvent(event);
    }

    function parseScale(value, resetAutoSettings, noScroll) {
        var scale,
            maxWidth,
            maxHeight;

        if (value === 'custom') {
            scale = parseFloat(document.getElementById('customScaleOption').textContent) / 100;
        } else {
            scale = parseFloat(value);
        }

        if (scale) {
            setScale(scale, true, noScroll);
            return;
        }

        maxWidth = canvasContainer.clientWidth - kScrollbarPadding;
        maxHeight = canvasContainer.clientHeight - kScrollbarPadding;

        switch (value) {
        case 'page-actual':
            setScale(1, resetAutoSettings, noScroll);
            break;
        case 'page-width':
            self.fitToWidth(maxWidth);
            break;
        case 'page-height':
            self.fitToHeight(maxHeight);
            break;
        case 'page-fit':
            self.fitToPage(maxWidth, maxHeight);
            break;
        case 'auto':
            if (self.isPresentation()) {
                self.fitToPage(maxWidth + kScrollbarPadding, maxHeight + kScrollbarPadding);
            } else {
                self.fitSmart(maxWidth);
            }
            break;
        }

        selectScaleOption(value);
    }


    /**
     * Shows the 'n'th page. If n is larger than the page count,
     * shows the last page. If n is less than 1, shows the first page.
     * @return {undefined}
     */
    this.showPage = function (n) {
        if (n <= 0) {
            n = 1;
        } else if (n > pages.length) {
            n = pages.length;
        }

        odfCanvas.showPage(n);

        currentPage = n;
        document.getElementById('pageNumber').value = currentPage;
    };

    /**
     * Shows the next page. If there is no subsequent page, does nothing.
     * @return {undefined}
     */
    this.showNextPage = function () {
        self.showPage(currentPage + 1);
    };

    /**
     * Shows the previous page. If there is no previous page, does nothing.
     * @return {undefined}
     */
    this.showPreviousPage = function () {
        self.showPage(currentPage - 1);
    };

    /**
     * Attempts to 'download' the file.
     * @return {undefined}
     */
    this.download = function () {
        var documentUrl = url.split('#')[0];
        documentUrl += '#viewer.action=download';
        window.open(documentUrl, '_parent');
    };
 
    /**
     * Gets the zoom level of the document
     * @return {!number}
     */
    this.getZoomLevel = function () {
        return odfCanvas.getZoomLevel();
    };

    /**
     * Set the zoom level of the document
     * @param {!number} value
     * @return {undefined}
     */
    this.setZoomLevel = function (value) {
        odfCanvas.setZoomLevel(value);
    };

    function showOverlayNavigator() {
        if (isSlideshow) {
            overlayNavigator.className = 'touched';
            window.clearTimeout(touchTimer);
            touchTimer = window.setTimeout(function () {
                overlayNavigator.className = '';
            }, 2000);
        }
    }

    function init() {
        var session,
            sessionController,
            sessionView,
            odtDocument,
            shadowCursor,
            selectionViewManager,
            caretManager,
            localMemberId = 'localuser',
            hyperlinkTooltipView,
            eventManager;

        odfElement = document.getElementById('canvas');
        odfCanvas = new odf.OdfCanvas(odfElement);
        odfCanvas.load(url);

        odfCanvas.addListener('statereadychange', function () {
            root = odfCanvas.odfContainer().rootElement;
            initialized = true;
            documentType = odfCanvas.odfContainer().getDocumentType(root);
            if (documentType === 'text') {
                odfCanvas.enableAnnotations(true, false);

                session = new ops.Session(odfCanvas);
                odtDocument = session.getOdtDocument();
                shadowCursor = new gui.ShadowCursor(odtDocument);
                sessionController = new gui.SessionController(session, localMemberId, shadowCursor, {});
                eventManager = sessionController.getEventManager();
                caretManager = new gui.CaretManager(sessionController, odfCanvas.getViewport());
                selectionViewManager = new gui.SelectionViewManager(gui.SvgSelectionView);
                sessionView = new gui.SessionView({
                    caretAvatarsInitiallyVisible: false
                }, localMemberId, session, sessionController.getSessionConstraints(), caretManager, selectionViewManager);
                selectionViewManager.registerCursor(shadowCursor);
                hyperlinkTooltipView = new gui.HyperlinkTooltipView(odfCanvas,
                    sessionController.getHyperlinkClickHandler().getModifier);
                eventManager.subscribe("mousemove", hyperlinkTooltipView.showTooltip);
                eventManager.subscribe("mouseout", hyperlinkTooltipView.hideTooltip);

                var op = new ops.OpAddMember();
                op.init({
                    memberid: localMemberId,
                    setProperties: {
                        fillName: runtime.tr("Unknown Author"),
                        color: "blue"
                    }
                });
                session.enqueue([op]);
                sessionController.insertLocalCursor();
            }

            isSlideshow = self.isPresentation();
            if (isSlideshow) {
                // No padding for slideshows
                canvasContainer.style.padding = 0;
                // Show page nav controls only for presentations
                pageSwitcher.style.visibility = 'visible';
            }

            initialized = true;
            pages = getPages();
            document.getElementById('numPages').innerHTML = 'of ' + pages.length;

            self.showPage(1);

            // Set default scale
            parseScale(kDefaultScale);
        });

        document.getElementById('download').addEventListener('click', function () {
            self.download();
        });

        document.getElementById('previous').addEventListener('click', function () {
            self.showPreviousPage();
        });

        document.getElementById('next').addEventListener('click', function () {
            self.showNextPage();
        });

        document.getElementById('previousPage').addEventListener('click', function () {
            self.showPreviousPage();
        });

        document.getElementById('nextPage').addEventListener('click', function () {
            self.showNextPage();
        });

        document.getElementById('pageNumber').addEventListener('change', function () {
            self.showPage(this.value);
        });

        document.getElementById('scaleSelect').addEventListener('change', function () {
            parseScale(this.value);
        });

        canvasContainer.addEventListener('click', showOverlayNavigator);
        overlayNavigator.addEventListener('click', showOverlayNavigator);

        window.addEventListener('scalechange', function (evt) {
            var customScaleOption = document.getElementById('customScaleOption'),
                predefinedValueFound = selectScaleOption(String(evt.scale));

            customScaleOption.selected = false;

            if (!predefinedValueFound) {
                customScaleOption.textContent = Math.round(evt.scale * 10000) / 100 + '%';
                customScaleOption.selected = true;
            }
        }, true);

        window.addEventListener('resize', function (evt) {
            if (initialized &&
                        (document.getElementById('pageWidthOption').selected ||
                        document.getElementById('pageAutoOption').selected)) {
                parseScale(document.getElementById('scaleSelect').value);
            }
            showOverlayNavigator();
        });

        window.addEventListener('keydown', function (evt) {
            var key = evt.keyCode,
                shiftKey = evt.shiftKey;

            switch (key) {
            case 33: // pageUp
            case 38: // up
            case 37: // left
                self.showPreviousPage();
                break;
            case 34: // pageDown
            case 40: // down
            case 39: // right
                self.showNextPage();
                break;
            case 32: // space
                shiftKey ? self.showPreviousPage() : self.showNextPage();
                break;
            }
        });
    }

    init();
}

function loadDocument(url) {
    new ODFViewer(url);
}