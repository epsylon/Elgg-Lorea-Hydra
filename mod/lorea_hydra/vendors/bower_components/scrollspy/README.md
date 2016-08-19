# ScrollSpy

[![bower](https://img.shields.io/bower/v/scrollspy.svg?style=flat)](https://github.com/makotot/scrollspy)

[![DevDependencies](http://img.shields.io/david/dev/makotot/scrollspy.svg?style=flat)](https://github.com/makotot/scrollspy)

> Scrollspy library.

## Installation

```sh
$ bower install scrollspy
```

## Usage

```html
<div id="js-scrollspy">
  <ul class="js-scrollspy-nav">
    <li><a href="#internal-link">internal-link</a></li>
    <li><a href="#...">...</a></li>
    <li><a href="#...">...</a></li>
    <li><a href="#...">...</a></li>
  </ul>
  ...
  <div>
    <div id="internal-content"></div>
    ...
  </div>
</div>
...
<script src="./bower_components/scrollspy.js"></script>
```

```js
var spy = new ScrollSpy('#js-scrollspy', {
  nav: '.js-scrollspy-nav > li > a',
  className: 'is-inview'
});
```


## License

MIT
