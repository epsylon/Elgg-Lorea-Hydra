<?php
/**
 * Modbash Clean Elgg Theme
 *
 * Copyright (c) 2015 ModBash
 *
 * @author     Shane Barron <admin@modbash.com>
 * @copyright  2015 SocialApparatus
 * @license    GNU General Public License (GPL) version 2
 * @version    1
 * @link       http://modbash.com
 */
?>
/* <style> /**/

    /* Clearfix */
    .clearfix:after,
    .elgg-grid:after,
    .elgg-layout:after,
    .elgg-inner:after,
    .elgg-page-header:after,
    .elgg-page-footer:after,
    .elgg-head:after,
    .elgg-foot:after,
    .elgg-col:after,
    .elgg-col-alt:after,
    .elgg-image-block:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;	
    }

    /* Fluid width container that does not wrap floats */
    .elgg-body,
    .elgg-col-last {
        display: block;
        word-wrap: break-word;
        overflow: hidden;
    }

    <?php
    /**
     * elgg-body fills the space available to it.
     * It uses hidden text to expand itself. The combination of auto width, overflow
     * hidden, and the hidden text creates this effect.
     *
     * This allows us to float fixed width divs to either side of an .elgg-body div
     * without having to specify the body div's width.
     *
     * @todo check what happens with long <pre> tags or large images
     * @todo Move this to its own file -- it is very complicated and should not have to be overridden.
     */
//@todo isn't this only needed if we use display:table-cell?
    ?>
    .elgg-body:after,
    .elgg-col-last:after {
        display: block;
        visibility: hidden;
        height: 0 !important;
        line-height: 0;
        overflow: hidden;

        /* Stretch to fill up available space */
        font-size: xx-large;
        content: " x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x ";
    }

    /* ***************************************
     * MENUS
     *
     * To add separators to a menu:
     * .elgg-menu-$menu > li:after {content: '|'; background: ...;}
     *************************************** */
    /* Enabled nesting of dropdown/flyout menus */
    .elgg-menu > li { position: relative; }

    .elgg-menu > li:last-child::after {
        display: none;
    }

    /* Maximize click target */
    .elgg-menu > li > a { display: block }

    /* Horizontal menus w/ separator support */
    .elgg-menu-hz > li,
    .elgg-menu-hz > li:after,
    .elgg-menu-hz > li > a,
    .elgg-menu-hz > li > span {
        vertical-align: middle;
    }

    /* Allow inline image blocks in horizontal menus */
    .elgg-menu-hz .elgg-body:after { content: '.'; }

    <?php //@todo This isn't going to work as-is.  Needs testing  ?>
    /* Inline block */
    .elgg-gallery > li,
    .elgg-button,
    .elgg-icon,
    .elgg-menu-hz > li,
    .elgg-menu-hz > li:after,
    .elgg-menu-hz > li > a,
    .elgg-menu-hz > li > span {
        /* Google says do this, but why? */
        position: relative;

        display: inline-block;
    }
