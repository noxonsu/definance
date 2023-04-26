<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root"></div>

<script>
      !function (e) {
        function r(r) {
          for (var n, i, a = r[0], c = r[1], l = r[2], s = 0, p = []; s < a.length; s++) 
            i = a[s],
            Object
              .prototype
              .hasOwnProperty
              .call(o, i) && o[i] && p.push(o[i][0]),
            o[i] = 0;
          for (n in c) 
            Object
              .prototype
              .hasOwnProperty
              .call(c, n) && (e[n] = c[n]);
          for (f && f(r); p.length;) 
            p.shift()();
          return u
            .push
            .apply(u, l || []),
          t()
        }
        function t() {
          for (var e, r = 0; r < u.length; r++) {
            for (var t = u[r], n = !0, a = 1; a < t.length; a++) {
              var c = t[a];
              0 !== o[c] && (n = !1)
            }
            n && (u.splice(r--, 1), e = i(i.s = t[0]))
          }
          return e
        }
        var n = {},
          o = {
            2: 0
          },
          u = [];
        function i(r) {
          if (n[r]) 
            return n[r].exports;
          var t = n[r] = {
            i: r,
            l: !1,
            exports: {}
          };
          return e[r].call(t.exports, t, t.exports, i),
          t.l = !0,
          t.exports
        }
        i.e = function (e) {
          var r = [],
            t = o[e];
          if (0 !== t) 
            if (t) 
              r.push(t[2]);
            else {
              var n = new Promise((function (r, n) {
                t = o[e] = [r, n]
              }));
              r.push(t[2] = n);
              var u,
                a = document.createElement("script");
              a.charset = "utf-8",
              a.timeout = 120,
              i.nc && a.setAttribute("nonce", i.nc),
              a.src = function (e) {
                return i.p + "static/js/" + (
                {}[e] || e) + ".chunk.js"
              }(e);
              var c = new Error;
              u = function (r) {
                a.onerror = a.onload = null,
                clearTimeout(l);
                var t = o[e];
                if (0 !== t) {
                  if (t) {
                    var n = r && (
                        "load" === r.type
                        ? "missing"
                        : r.type),
                      u = r && r.target && r.target.src;
                    c.message = "Loading chunk " + e + " failed.\n(" + n + ": " + u + ")",
                    c.name = "ChunkLoadError",
                    c.type = n,
                    c.request = u,
                    t[1](c)
                  }
                  o[e] = void 0
                }
              };
              var l = setTimeout((function () {
                u({type: "timeout", target: a})
              }), 12e4);
              a.onerror = a.onload = u,
              document
                .head
                .appendChild(a)
            }
          return Promise.all(r)
        },
        i.m = e,
        i.c = n,
        i.d = function (e, r, t) {
          i.o(e, r) || Object.defineProperty(e, r, {
            enumerable: !0,
            get: t
          })
        },
        i.r = function (e) {
          "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}),
          Object.defineProperty(e, "__esModule", {
            value: !0
          })
        },
        i.t = function (e, r) {
          if (1 & r && (e = i(e)), 8 & r) 
            return e;
          if (4 & r && "object" == typeof e && e && e.__esModule) 
            return e;
          var t = Object.create(null);
          if (i.r(t), Object.defineProperty(t, "default", {
            enumerable: !0,
            value: e
          }), 2 & r && "string" != typeof e) 
            for (var n in e) 
              i.d(t, n, function (r) {
                return e[r]
              }.bind(null, n));
        return t
        },
        i.n = function (e) {
          var r = e && e.__esModule
            ? function () {
              return e.default
            }
            : function () {
              return e
            };
          return i.d(r, "a", r),
          r
        },
        i.o = function (e, r) {
          return Object
            .prototype
            .hasOwnProperty
            .call(e, r)
        },
        i.p = "./",
        i.oe = function (e) {
          throw console.error(e),
          e
        };
        var a = this.webpackJsonpunifactory = this.webpackJsonpunifactory || [],
          c = a
            .push
            .bind(a);
        a.push = r,
        a = a.slice();
        for (var l = 0; l < a.length; l++) 
          r(a[l]);
        var f = c;
        t()
      }([])
    </script>

<style>
/*
 Fix modal styles from the @reach/dialog npm package.
 For now we have to find a class hash for some new builds and update this selector.
 */
    .sc-bkbkJK,
    .hpGtei {
        background: hsla(0, 0%, 0%, 0.33);
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        overflow: auto;
    }
    .disabled {
        cursor: not-allowed;
        pointer-events: none;
        opacity: 0.6;
    }
    /* 
    Fix external package styles (admin/LP fees slider)
    */
    .rc-slider {position: relative;height: 14px;padding: 5px 0;width: 100%;border-radius: 6px;touch-action: none;box-sizing: border-box;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.rc-slider * {box-sizing: border-box;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.rc-slider-rail {position: absolute;width: 100%;background-color: #e9e9e9;height: 4px;border-radius: 6px;}.rc-slider-track {position: absolute;left: 0;height: 4px;border-radius: 6px;background-color: #abe2fb;}.rc-slider-handle {position: absolute;width: 14px;height: 14px;cursor: pointer;cursor: -webkit-grab;margin-top: -5px;cursor: grab;border-radius: 50%;border: solid 2px #96dbfa;background-color: #fff;touch-action: pan-x;}.rc-slider-handle-dragging.rc-slider-handle-dragging.rc-slider-handle-dragging {border-color: #57c5f7;box-shadow: 0 0 0 5px #96dbfa;}.rc-slider-handle:focus {outline: none;}.rc-slider-handle-click-focused:focus {border-color: #96dbfa;box-shadow: unset;}.rc-slider-handle:hover {border-color: #57c5f7;}.rc-slider-handle:active {border-color: #57c5f7;box-shadow: 0 0 5px #57c5f7;cursor: -webkit-grabbing;cursor: grabbing;}.rc-slider-mark {position: absolute;top: 18px;left: 0;width: 100%;font-size: 12px;}.rc-slider-mark-text {position: absolute;display: inline-block;vertical-align: middle;text-align: center;cursor: pointer;color: #999;}.rc-slider-mark-text-active {color: #666;}.rc-slider-step {position: absolute;width: 100%;height: 4px;background: transparent;}.rc-slider-dot {position: absolute;bottom: -2px;margin-left: -4px;width: 8px;height: 8px;border: 2px solid #e9e9e9;background-color: #fff;cursor: pointer;border-radius: 50%;vertical-align: middle;}.rc-slider-dot-active {border-color: #96dbfa;}.rc-slider-dot-reverse {margin-right: -4px;}.rc-slider-disabled {background-color: #e9e9e9;}.rc-slider-disabled .rc-slider-track {background-color: #ccc;}.rc-slider-disabled .rc-slider-handle, .rc-slider-disabled .rc-slider-dot {border-color: #ccc;box-shadow: none;background-color: #fff;cursor: not-allowed;}.rc-slider-disabled .rc-slider-mark-text, .rc-slider-disabled .rc-slider-dot {cursor: not-allowed !important;}.rc-slider-vertical {width: 14px;height: 100%;padding: 0 5px;}.rc-slider-vertical .rc-slider-rail {height: 100%;width: 4px;}.rc-slider-vertical .rc-slider-track {left: 5px;bottom: 0;width: 4px;}.rc-slider-vertical .rc-slider-handle {margin-left: -5px;touch-action: pan-y;}.rc-slider-vertical .rc-slider-mark {top: 0;left: 18px;height: 100%;}.rc-slider-vertical .rc-slider-step {height: 100%;width: 4px;}.rc-slider-vertical .rc-slider-dot {left: 2px;margin-bottom: -4px;}.rc-slider-vertical .rc-slider-dot:first-child {margin-bottom: -4px;}.rc-slider-vertical .rc-slider-dot:last-child {margin-bottom: -4px;}.rc-slider-tooltip-zoom-down-enter, .rc-slider-tooltip-zoom-down-appear {animation-duration: 0.3s;animation-fill-mode: both;display: block !important;animation-play-state: paused;}.rc-slider-tooltip-zoom-down-leave {animation-duration: 0.3s;animation-fill-mode: both;display: block !important;animation-play-state: paused;}.rc-slider-tooltip-zoom-down-enter.rc-slider-tooltip-zoom-down-enter-active, .rc-slider-tooltip-zoom-down-appear.rc-slider-tooltip-zoom-down-appear-active {animation-name: rcSliderTooltipZoomDownIn;animation-play-state: running;}.rc-slider-tooltip-zoom-down-leave.rc-slider-tooltip-zoom-down-leave-active {animation-name: rcSliderTooltipZoomDownOut;animation-play-state: running;}.rc-slider-tooltip-zoom-down-enter, .rc-slider-tooltip-zoom-down-appear {transform: scale(0, 0);animation-timing-function: cubic-bezier(0.23, 1, 0.32, 1);}.rc-slider-tooltip-zoom-down-leave {animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);}@keyframes rcSliderTooltipZoomDownIn {0% {opacity: 0;transform-origin: 50% 100%;transform: scale(0, 0);}100% {transform-origin: 50% 100%;transform: scale(1, 1);}}@keyframes rcSliderTooltipZoomDownOut {0% {transform-origin: 50% 100%;transform: scale(1, 1);}100% {opacity: 0;transform-origin: 50% 100%;transform: scale(0, 0);}}.rc-slider-tooltip {position: absolute;left: -9999px;top: -9999px;visibility: visible;box-sizing: border-box;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.rc-slider-tooltip * {box-sizing: border-box;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}.rc-slider-tooltip-hidden {display: none;}.rc-slider-tooltip-placement-top {padding: 4px 0 8px 0;}.rc-slider-tooltip-inner {padding: 6px 2px;min-width: 24px;height: 24px;font-size: 12px;line-height: 1;color: #fff;text-align: center;text-decoration: none;background-color: #6c6c6c;border-radius: 6px;box-shadow: 0 0 4px #d9d9d9;}.rc-slider-tooltip-arrow {position: absolute;width: 0;height: 0;border-color: transparent;border-style: solid;}.rc-slider-tooltip-placement-top .rc-slider-tooltip-arrow {bottom: 4px;left: 50%;margin-left: -4px;border-width: 4px 4px 0;border-top-color: #6c6c6c;}

    <?php if(is_user_logged_in()){ ?>
    #root {
        margin-top: 30px;
    }
    <?php } ?>
</style>
<?php
definance_prepare_vendor();
?>
<script type="text/javascript">
  window.SO_Definance = {}
  window.SO_Definance.chainIds = ["<?php echo esc_attr( get_option( 'definance_blockchain' ) ) ?>","<?php echo esc_attr( get_option( 'definance_blockchain2' ) ) ?>","<?php echo esc_attr( get_option( 'definance_blockchain3' ) ) ?>"];
  window.SO_Definance.masterAddress = "<?php echo esc_attr( get_option( 'definance_master_address' ) ) ?>";
</script>
<script src="<?php echo esc_url( plugin_dir_url( DEFINANCE_BASE_FILE ) ); ?>vendor_cache/<?php echo DEFINANCE_VER?>/3.chunk.js?ver=<?php echo DEFINANCE_VER ?>"></script>
<script src="<?php echo esc_url( plugin_dir_url( DEFINANCE_BASE_FILE ) ); ?>vendor_cache/<?php echo DEFINANCE_VER?>/main.chunk.js?ver=<?php echo DEFINANCE_VER ?>"></script>
