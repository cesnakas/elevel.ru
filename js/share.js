(function (aM, a2) {
    var a3 = a2.documentElement;
    var aJ = {};

    function aj(a) {
        if (!(a in aJ)) {
            aJ[a] = new RegExp("(^|\\s+)" + a + "(\\s+|$)", "")
        }
        return aJ[a]
    }

    function ai(a, b) {
        return aj(b).test(a.className || "")
    }

    function aA(a, b) {
        if (!ai(a, b)) {
            a.className += " " + b
        }
    }

    function aO(a, b) {
        if (a) {
            a.className = a.className.replace(new RegExp("((?:^|\\s+)" + b + "|" + b + "(?:\\s+|$))", "g"), "")
        }
    }

    function a4(a, b) {
        if (ai(a, b)) {
            aO(a, b)
        } else {
            aA(a, b)
        }
    }
    var aL, al, aI = aL = function (e, d) {
            e = e || a2;
            var b = e[az] && e[az]("*"),
                c = [],
                f = 0,
                a = b.length;
            for (; f < a; f++) {
                if (ai(b[f], d)) {
                    c.push(b[f])
                }
            }
            return c
        };
    if (a2.querySelectorAll) {
        aL = function (b, a) {
            return b.querySelectorAll("." + a)
        }
    } else {
        if (a2.getElementsByClassName) {
            aL = function (b, a) {
                if (b.getElementsByClassName) {
                    return b.getElementsByClassName(a)
                }
                return aI(b, a)
            }
        }
    }

    function aH(c, a) {
        var b = c;
        do {
            if (ai(b, a)) {
                return b
            }
        } while (b = b.parentNode);
        return null
    }
    if (aM.innerHeight) {
        al = function () {
            return {
                width: aM.innerWidth,
                height: aM.innerHeight
            }
        }
    } else {
        if (a3 && a3.clientHeight) {
            al = function () {
                return {
                    width: a3.clientWidth,
                    height: a3.clientHeight
                }
            }
        } else {
            al = function () {
                var a = a2.body;
                return {
                    width: a.clientWidth,
                    height: a.clientHeight
                }
            }
        }
    }
    var aY = a2.addEventListener ? function (c, b, a) {
            c.addEventListener(b, a, false)
        } : function (c, b, a) {
            c.attachEvent("on" + b, a)
        }, ba = a2.removeEventListener ? function (c, b, a) {
            c.removeEventListener(b, a, false)
        } : function (c, b, a) {
            c.detachEvent("on" + b, a)
        };
    var aQ, ak;
    if ("onmouseenter" in a3) {
        aQ = function (b, a) {
            aY(b, "mouseenter", a)
        };
        ak = function (b, a) {
            aY(b, "mouseleave", a)
        }
    } else {
        aQ = function (b, a) {
            aY(b, "mouseover", function (c) {
                if (ag(c, this)) {
                    a(c)
                }
            })
        };
        ak = function (b, a) {
            aY(b, "mouseout", function (c) {
                if (ag(c, this)) {
                    a(c)
                }
            })
        }
    }

    function ag(a, c) {
        var b = a.relatedTarget;
        try {
            while (b && b !== c) {
                b = b.parentNode
            }
            if (b !== c) {
                return true
            }
        } catch (d) {}
    }

    function ar(a) {
        try {
            a.preventDefault()
        } catch (b) {
            a.returnValue = false
        }
    }

    function ao(a) {
        try {
            a.stopPropagation()
        } catch (b) {
            a.cancelBubble = true
        }
    }
    var aP = (function (f, d) {
        var b = {
            boxModel: null
        }, l = d.defaultView && d.defaultView.getComputedStyle,
            c = /([A-Z])/g,
            k = /-([a-z])/ig,
            j = function (o, n) {
                return n.toUpperCase()
            }, h = /^-?\d+(?:px)?$/i,
            e = /^-?\d/,
            a = function () {};
        if ("getBoundingClientRect" in a3) {
            return function (s) {
                if (!s || !s.ownerDocument) {
                    return null
                }
                m();
                var t = s.getBoundingClientRect(),
                    n = s.ownerDocument,
                    u = n.body,
                    p = (a3.clientTop || u.clientTop || 0) + (parseInt(u.style.marginTop, 10) || 0),
                    r = (a3.clientLeft || u.clientLeft || 0) + (parseInt(u.style.marginLeft, 10) || 0),
                    o = t.top + (f.pageYOffset || b.boxModel && a3.scrollTop || u.scrollTop) - p,
                    q = t.left + (f.pageXOffset || b.boxModel && a3.scrollLeft || u.scrollLeft) - r;
                return {
                    top: o,
                    left: q
                }
            }
        } else {
            return function (w) {
                if (!w || !w.ownerDocument) {
                    return null
                }
                i();
                var o = w.offsetParent,
                    p = w,
                    r = w.ownerDocument,
                    t, v = r.body,
                    u = r.defaultView,
                    q = u ? u.getComputedStyle(w, null) : w.currentStyle,
                    s = w.offsetTop,
                    n = w.offsetLeft;
                while ((w = w.parentNode) && w !== v && w !== a3) {
                    if (b.supportsFixedPosition && q.position === "fixed") {
                        break
                    }
                    t = u ? u.getComputedStyle(w, null) : w.currentStyle;
                    s -= w.scrollTop;
                    n -= w.scrollLeft;
                    if (w === o) {
                        s += w.offsetTop;
                        n += w.offsetLeft;
                        if (b.doesNotAddBorder && !(b.doesAddBorderForTableAndCells && /^t(able|d|h)$/i.test(w.nodeName))) {
                            s += parseFloat(t.borderTopWidth, 10) || 0;
                            n += parseFloat(t.borderLeftWidth, 10) || 0
                        }
                        p = o, o = w.offsetParent
                    }
                    if (b.subtractsBorderForOverflowNotVisible && t.overflow !== "visible") {
                        s += parseFloat(t.borderTopWidth, 10) || 0;
                        n += parseFloat(t.borderLeftWidth, 10) || 0
                    }
                    q = t
                }
                if (q.position === "relative" || q.position === "static") {
                    s += v.offsetTop;
                    n += v.offsetLeft
                }
                if (b.supportsFixedPosition && q.position === "fixed") {
                    s += Math.max(a3.scrollTop, v.scrollTop);
                    n += Math.max(a3.scrollLeft, v.scrollLeft)
                }
                return {
                    top: s,
                    left: n
                }
            }
        }

        function g(w, p, o) {
            var s, q = w.style;
            if (!o && q && q[p]) {
                s = q[p]
            } else {
                if (l) {
                    p = p.replace(c, "-$1").toLowerCase();
                    var t = w.ownerDocument.defaultView;
                    if (!t) {
                        return null
                    }
                    var r = t.getComputedStyle(w, null);
                    if (r) {
                        s = r.getPropertyValue(p)
                    }
                } else {
                    if (w.currentStyle) {
                        var v = p.replace(k, j);
                        s = w.currentStyle[p] || w.currentStyle[v];
                        if (!h.test(s) && e.test(s)) {
                            var n = q.left,
                                u = w.runtimeStyle.left;
                            w.runtimeStyle.left = w.currentStyle.left;
                            q.left = v === "fontSize" ? "1em" : (s || 0);
                            s = q.pixelLeft + "px";
                            q.left = n;
                            w.runtimeStyle.left = u
                        }
                    }
                }
            }
            return s
        }

        function m() {
            var n = d.createElement("div");
            n.style.width = n.style.paddingLeft = "1px";
            d.body.appendChild(n);
            b.boxModel = n.offsetWidth === 2;
            d.body.removeChild(n).style.display = "none";
            n = null;
            m = a
        }

        function i() {
            var u = d.body,
                t = d.createElement("div"),
                p, r, n, o, s = parseFloat(g(u, "marginTop", true), 10) || 0,
                q = "<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";
            t.style.cssText = "position:absolute;top:0;lefto:0;margin:0;border:0;width:1px;height:1px;visibility:hidden;";
            t.innerHTML = q;
            u.insertBefore(t, u.firstChild);
            p = t.firstChild;
            r = p.firstChild;
            o = p.nextSibling.firstChild.firstChild;
            b.doesNotAddBorder = (r.offsetTop !== 5);
            b.doesAddBorderForTableAndCells = (o.offsetTop === 5);
            r.style.position = "fixed", r.style.top = "20px";
            b.supportsFixedPosition = (r.offsetTop === 20 || r.offsetTop === 15);
            r.style.position = r.style.top = "";
            p.style.overflow = "hidden", p.style.position = "relative";
            b.subtractsBorderForOverflowNotVisible = (r.offsetTop === -5);
            b.doesNotIncludeMarginInBodyOffset = (u.offsetTop !== s);
            u.removeChild(t);
            u = t = p = r = n = o = null;
            m();
            i = a
        }
    })(aM, a2);
    var a5 = (function (g, b) {
        var e = false,
            f = false,
            a = [],
            d;

        function c() {
            if (!e) {
                if (!b.body) {
                    return setTimeout(c, 13)
                }
                e = true;
                if (a) {
                    var j, k = 0;
                    while ((j = a[k++])) {
                        j.call(null)
                    }
                    a = null
                }
            }
        }

        function h() {
            if (f) {
                return
            }
            f = true;
            if (b.readyState === "complete") {
                return c()
            }
            if (b.addEventListener) {
                b.addEventListener("DOMContentLoaded", d, false);
                g.addEventListener("load", c, false)
            } else {
                if (b.attachEvent) {
                    b.attachEvent("onreadystatechange", d);
                    g.attachEvent("onload", c);
                    var k = false;
                    try {
                        k = g.frameElement == null
                    } catch (j) {}
                    if (a3.doScroll && k) {
                        i()
                    }
                }
            }
        }
        if (b.addEventListener) {
            d = function () {
                b.removeEventListener("DOMContentLoaded", d, false);
                c()
            }
        } else {
            if (b.attachEvent) {
                d = function () {
                    if (b.readyState === "complete") {
                        b.detachEvent("onreadystatechange", d);
                        c()
                    }
                }
            }
        }

        function i() {
            if (e) {
                return
            }
            try {
                a3.doScroll("left")
            } catch (j) {
                setTimeout(i, 1);
                return
            }
            c()
        }
        return function (j) {
            h();
            if (e) {
                j.call(null)
            } else {
                a.push(j)
            }
        }
    })(aM, a2);

    function aN() {
        var a = (function (e) {
            e = e.toLowerCase();
            var f = /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version)?[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || !/compatible/.test(e) && /(mozilla)(?:.*? rv:([\w.]+))?/.exec(e) || [];
            return {
                browser: f[1] || "",
                version: f[2] || "0"
            }
        })(navigator.userAgent);
        var c = '.b-share-popup-wrap{z-index:1073741823;position:absolute;width:500px}.b-share-popup{position:absolute;z-index:1073741823;border:1px solid #888;background:#FFF;color:#000}.b-share-popup-wrap .b-share-popup_down{top:0}.b-share-popup-wrap .b-share-popup_up{bottom:0}.b-share-popup-wrap_state_hidden{position:absolute!important;top:-9999px!important;right:auto!important;bottom:auto!important;left:-9999px!important;visibility:hidden!important}.b-share-popup,x:nth-child(1){border:0;padding:1px!important}@media all and (resolution = 0dpi){.b-share-popup,x:nth-child(1),x:-o-prefocus{padding:0!important;border:1px solid #888}}.b-share-popup__i{display:-moz-inline-box;display:inline-block;padding:5px 0!important;overflow:hidden;vertical-align:top;white-space:nowrap;visibility:visible;background:#FFF;-webkit-box-shadow:0 2px 9px rgba(0,0,0,0.6);-moz-box-shadow:0 2px 9px rgba(0,0,0,0.6);box-shadow:0 2px 9px rgba(0,0,0,0.6)}.b-share-popup__item{font:1em/1.25em Arial,sans-serif;display:block;padding:5px 15px!important;white-space:nowrap;background:#FFF}.b-share-popup__item,a.b-share-popup__item:link,a.b-share-popup__item:visited{text-decoration:none!important;border:0!important}a.b-share-popup__item{cursor:pointer}a.b-share-popup__item .b-share-popup__item__text{display:inline;text-decoration:underline;color:#1a3dc1}a.b-share-popup__item:hover{word-spacing:0}a.b-share-popup__item:hover .b-share-popup__item__text{color:#F00;cursor:pointer}.b-share-popup__icon{display:-moz-inline-box;display:inline-block;margin:-3px 0 0 0;padding:0 5px 0 0!important;vertical-align:middle}.b-share-popup__icon_input{width:21px;height:16px;margin-top:-6px;padding:0!important}.b-share-popup__icon__input{margin-right:0;margin-left:2px;vertical-align:top}.b-share-popup__spacer{display:block;padding-top:10px!important}.b-share-popup__header{font:86%/1em Verdana,sans-serif;display:block;padding:10px 15px 5px 15px!important;color:#999}.b-share-popup__header_first{padding-top:5px!important}.b-share-popup__input{font:86%/1em Verdana,sans-serif;display:block;padding:5px 15px!important;color:#999;text-align:left}.b-share-popup__input__input{font:1em/1em Verdana,sans-serif;display:block;width:10px;margin:5px 0 0;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;resize:none;text-align:left;direction:ltr}.b-share-popup_down .b-share-popup_with-link .b-share-popup__input_link{position:absolute;top:5px;right:0;left:0}.b-share-popup_up .b-share-popup_with-link .b-share-popup__input_link{position:absolute;right:0;bottom:5px;left:0}.b-share-popup_down .b-share-popup_with-link{padding-top:55px!important}.b-share-popup_up .b-share-popup_with-link{padding-bottom:55px!important}.b-share-popup_down .b-share-popup_expandable .b-share-popup__main{padding-bottom:25px!important}.b-share-popup_up .b-share-popup_expandable .b-share-popup__main{padding-top:25px!important}.b-share-popup_down .b-share-popup_yandexed{padding-bottom:10px!important}.b-share-popup_up .b-share-popup_yandexed{padding-top:10px!important}.b-share-popup__yandex{position:absolute;right:4px;bottom:2px;font:78.125%/1em Verdana,sans-serif;padding:3px!important;background:transparent}a.b-share-popup__yandex:link,a.b-share-popup__yandex:visited{color:#c6c5c5;text-decoration:none}a.b-share-popup__yandex:link:hover,a.b-share-popup__yandex:visited:hover{color:#F00;text-decoration:underline}.b-share-popup_up .b-share-popup__yandex{top:2px;bottom:auto}.b-share-popup_expandable .b-share-popup__yandex{right:auto;left:4px}.b-share-popup_to-right .b-share-popup_expandable .b-share-popup__yandex{right:4px;left:auto}.b-share-popup__expander .b-share-popup__item{position:absolute;bottom:5px;font:86%/1em Verdana,sans-serif;margin:10px 0 0;padding:5px 10px!important;cursor:pointer;color:#999;background:transparent}.b-share-popup_to-right,.b-share-popup_to-right .b-share-popup__expander{direction:rtl}.b-share-popup_to-right .b-share-popup__expander .b-share-popup__icon{padding:0 0 0 5px!important}.b-share-popup_up .b-share-popup__expander .b-share-popup__item{top:-5px;bottom:auto}.b-share-popup__expander .b-share-popup__item:hover .b-share-popup__item__text{text-decoration:underline}.b-share-popup__expander .b-ico_action_rarr,.b-share-popup_to-right .b-share-popup__expander .b-ico_action_larr,.b-share-popup_full .b-share-popup__expander .b-ico_action_larr,.b-share-popup_to-right .b-share-popup_full .b-share-popup__expander .b-ico_action_rarr,.b-share-popup__expander .b-share-popup__item__text_collapse,.b-share-popup_full .b-share-popup__item__text_expand{display:none}.b-share-popup_to-right .b-share-popup__expander .b-ico_action_rarr,.b-share-popup_full .b-share-popup__item__text_collapse,.b-share-popup_full .b-share-popup__expander .b-ico_action_rarr,.b-share-popup_to-right .b-share-popup_full .b-share-popup__expander .b-ico_action_larr{display:inline}.b-ico_action_rarr,.b-ico_action_larr{width:8px;height:7px;border:0}.b-share-popup__main,.b-share-popup__extra{direction:ltr;vertical-align:bottom;text-align:left}.b-share-popup_down .b-share-popup__main,.b-share-popup_down .b-share-popup__extra{vertical-align:top}.b-share-popup__main{display:-moz-inline-stack;display:inline-block}.b-share-popup__extra{display:none;margin:0 -10px 0 0}.b-share-popup_full .b-share-popup__extra{display:-moz-inline-stack;display:inline-block}.b-share-popup_to-right .b-share-popup__extra{margin:0 0 0 -10px}.b-share-popup__tail{position:absolute;width:21px;height:10px;margin:0 0 0 -11px}.b-share-popup_down .b-share-popup__tail{top:-10px;background:url(//yandex.st/share/static/b-share-popup_down__tail.gif) 0 0 no-repeat}.b-share-popup_up .b-share-popup__tail{bottom:-10px;background:url(//yandex.st/share/static/b-share-popup_up__tail.gif) 0 0 no-repeat}.b-share-popup_down .b-share-popup__tail,x:nth-child(1){top:-9px;background-image:url(//yandex.st/share/static/b-share-popup_down__tail.png)}.b-share-popup_up .b-share-popup__tail,x:nth-child(1){bottom:-9px;background-image:url(//yandex.st/share/static/b-share-popup_up__tail.png)}@media all and (resolution = 0dpi){.b-share-popup_down .b-share-popup__tail,x:nth-child(1),x:-o-prefocus{top:-10px;background-image:url(//yandex.st/share/static/b-share-popup_down__tail.gif)}.b-share-popup_up .b-share-popup__tail,x:nth-child(1),x:-o-prefocus{bottom:-10px;background-image:url(//yandex.st/share/static/b-share-popup_up__tail.gif)}}.b-share-popup .b-share-popup_show_form_mail,.b-share-popup .b-share-popup_show_form_html{padding:0!important}.b-share-popup .b-share-popup_show_form_mail .b-share-popup__main,.b-share-popup .b-share-popup_show_form_html .b-share-popup__main,.b-share-popup .b-share-popup_show_form .b-share-popup__main,.b-share-popup .b-share-popup_show_form_mail .b-share-popup__extra,.b-share-popup .b-share-popup_show_form_html .b-share-popup__extra,.b-share-popup .b-share-popup_show_form .b-share-popup__extra{height:15px;padding:0!important;overflow:hidden;visibility:hidden}.b-share-popup_show_form_mail .b-share-popup__expander,.b-share-popup_show_form_html .b-share-popup__expander,.b-share-popup_show_form .b-share-popup__expander,.b-share-popup_show_form_mail .b-share-popup__input_link,.b-share-popup_show_form_html .b-share-popup__input_link,.b-share-popup_show_form .b-share-popup__input_link{display:none}.b-share-popup__form{position:relative;display:none;overflow:hidden;padding:5px 0 0!important;margin:0 0 -15px;white-space:normal}.b-share-popup_show_form_mail .b-share-popup__form_mail,.b-share-popup_show_form_html .b-share-popup__form_html,.b-share-popup_show_form .b-share-popup__form{display:block}.b-share-popup__form__link{font:86%/1.4545em Verdana,sans-serif;float:left;display:inline;padding:5px!important;margin:0 0 5px 10px;text-decoration:underline;cursor:pointer;color:#1a3dc1}.b-share-popup__form__button{font:86%/1.4545em Verdana,sans-serif;float:left;display:inline;margin:5px 0 0 15px}.b-share-popup__form__close{font:86%/1.4545em Verdana,sans-serif;float:right;display:inline;padding:5px!important;margin:0 10px 5px 0;cursor:pointer;color:#999}a.b-share-popup__form__link:hover,a.b-share-popup__form__close:hover{text-decoration:underline;color:#F00}.b-share-popup_font_fixed .b-share-popup__item{font-size:12.8px}.b-share-popup_font_fixed .b-share-popup__header,.b-share-popup_font_fixed .b-share-popup__input,.b-share-popup_font_fixed .b-share-popup__expander .b-share-popup__item,.b-share-popup_font_fixed .b-share-popup__form__link,.b-share-popup_font_fixed .b-share-popup__form__button,.b-share-popup_font_fixed .b-share-popup__form__close{font-size:11px}.b-share-popup_font_fixed .b-share-popup__yandex{font-size:10px}.b-share-form-button{font:86%/17px Verdana,Arial,sans-serif;display:-moz-inline-box;display:inline-block;position:relative;height:19px;margin:0 3px;padding:0 4px;cursor:default;white-space:nowrap;text-decoration:none!important;color:#000!important;border:none;outline:none;background:url(//yandex.st/share/static/b-share-form-button.png) 0 -20px repeat-x}.b-share-form-button:link:hover,.b-share-form-button:visited:hover{color:#000!important}.b-share-form-button__before,.b-share-form-button__after{position:absolute;width:3px;height:19px;background:url(//yandex.st/share/static/b-share-form-button.png)}.b-share-form-button__before{margin-left:-7px}.b-share-form-button__after{margin-left:4px;background-position:-3px 0}.b-share-form-button::-moz-focus-inner{border:none}button.b-share-form-button .b-share-form-button__before,button.b-share-form-button .b-share-form-button__after{margin-top:-1px}@-moz-document url-prefix(){button.b-share-form-button .b-share-form-button__after{margin-top:-2px;margin-left:6px}button.b-share-form-button .b-share-form-button__before{margin-top:-2px;margin-left:-9px}}SPAN.b-share-form-button:hover,.b-share-form-button_state_hover{background-position:0 -60px}SPAN.b-share-form-button:hover .b-share-form-button__before,.b-share-form-button_state_hover .b-share-form-button__before{background-position:0 -40px}SPAN.b-share-form-button:hover .b-share-form-button__after,.b-share-form-button_state_hover .b-share-form-button__after{background-position:-3px -40px}.b-share-form-button_state_pressed,.b-share-form-button_state_pressed .b-share-form-button_share{background-position:0 -100px!important}.b-share-form-button_state_pressed .b-share-form-button__before{background-position:0 -80px!important}.b-share-form-button_state_pressed .b-share-form-button__after{background-position:-3px -80px!important}button.b-share-form-button_state_pressed{overflow:visible}.b-share-form-button_icons{position:relative;padding:0;background-position:0 -20px!important}.b-share-form-button_icons .b-share-form-button__before{left:0;margin-left:-3px;background-position:0 0!important}.b-share-form-button_icons .b-share-form-button__after{z-index:-1;margin-left:0;background-position:-3px 0!important}.b-share-form-button_icons .b-share__handle{padding:2px!important}.b-share-form-button_icons .b-share__handle_more{position:relative;padding-right:6px!important;margin-right:-4px}.b-share-form-button_icons .b-share-icon{opacity:.5;background-image:url(//yandex.st/share/static/b-share-icon_size_14.png)}.b-share-form-button_icons A.b-share__handle:hover .b-share-icon{opacity:1}.b-share{font:86%/1.4545em Arial,sans-serif;display:-moz-inline-box;display:inline-block;padding:1px 3px 1px 4px!important;vertical-align:middle}.b-share .b-share-form-button{font-size:1em}.b-share__text .b-share-icon{margin:0 5px 0 0;border:none}.b-share__text{margin-right:5px}.b-share__handle{float:left;cursor:pointer;text-align:left;text-decoration:none!important;height:16px;padding:5px 3px 5px 2px!important;cursor:pointer;text-align:left;text-decoration:none!important}.b-share__handle_cursor_default{cursor:default}.b-share__handle .b-share-form-button{margin-top:-2px}.b-share__hr{display:none;float:left;width:1px;height:26px;margin:0 3px 0 2px}a.b-share__handle:hover .b-share__text{text-decoration:underline;color:#F00}.b-share_bordered{padding:0 2px 0 3px!important;border:1px solid #e4e4e4;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px}.b-share_bordered .b-share__hr{display:inline;background:#e4e4e4}.b-share_link{margin:-8px 0}a.b-share_link{margin:0}.b-share_link .b-share__text{text-decoration:underline;color:#1a3dc1}.b-share-form-button_share{padding-left:26px!important;vertical-align:top}.b-share-form-button_share .b-share-form-button__before{margin-left:-29px}.b-share-form-button_share .b-share-form-button__icon{position:absolute;width:20px;height:17px;margin:1px 0 0 -23px;background:url(//yandex.st/share/static/b-share-form-button_share__icon.png) 0 0 no-repeat}.b-share-pseudo-link{border-bottom:1px dotted;cursor:pointer;text-decoration:none!important}.b-share_font_fixed{font-size:11px}.b-share__handle_more{font-size:9px;margin-top:-1px;color:#7b7b7b}A.b-share__handle_more:hover{color:#000}.b-share__group{float:left}.b-share-icon{float:left;display:inline;overflow:hidden;width:16px;height:16px;padding:0!important;vertical-align:top;border:0;background:url(//yandex.st/share/static/b-share-icon.png) 0 99px no-repeat}.b-share-icon_vkontakte,.b-share-icon_custom{background-position:0 0}.b-share-icon_yaru,.b-share-icon_yaru_photo,.b-share-icon_yaru_wishlist{background-position:0 -17px}.b-share-icon_lj{background-position:0 -34px}.b-share-icon_twitter{background-position:0 -51px}.b-share-icon_facebook{background-position:0 -68px}.b-share-icon_moimir{background-position:0 -85px}.b-share-icon_friendfeed{background-position:0 -102px}.b-share-icon_mail{background-position:0 -119px}.b-share-icon_html{background-position:0 -136px}.b-share-icon_postcard{background-position:0 -153px}.b-share-icon_odnoklassniki{background-position:0 -170px}.b-share-icon_blogger{background-position:0 -187px}.b-share-icon_greader{background-position:0 -204px}.b-share-icon_delicious{background-position:0 -221px}.b-share-icon_gbuzz{background-position:0 -238px}.b-share-icon_linkedin{background-position:0 -255px}.b-share-icon_myspace{background-position:0 -272px}.b-share-icon_evernote{background-position:0 -289px}.b-share-icon_digg{background-position:0 -306px}.b-share-icon_juick{background-position:0 -324px}.b-share-icon_moikrug{background-position:0 -341px}.b-share-icon_yazakladki{background-position:0 -358px}.b-share-icon_liveinternet{background-position:0 -375px}.b-share-icon_tutby{background-position:0 -392px}.b-share-icon_diary{background-position:0 -409px}.b-share-icon_gplus{background-position:0 -426px}.b-share-icon_pocket{background-position:0 -443px}.b-share-icon_surfingbird{background-position:0 -460px}.b-share-icon_pinterest{background-position:0 -477px}.b-share_theme_dark .b-share-icon{background:url(//yandex.st/share/static/b-share-icons__theme_dark.png) 99px 0 no-repeat}.b-share_theme_dark .b-share-icon_odnoklassniki{background-position:-4px -3px}.b-share_theme_dark .b-share-icon_vkontakte{background-position:-24px -3px}.b-share_theme_dark .b-share-icon_twitter{background-position:-44px -3px}.b-share_theme_dark .b-share-icon_facebook{background-position:-64px -3px}.b-share_theme_dark .b-share-icon_lj{background-position:-85px -3px}.b-share_theme_dark .b-share-icon_yaru{background-position:-105px -3px}.b-share_theme_dark .b-share-popup .b-share-icon_odnoklassniki,.b-share_theme_dark .b-share-icon_odnoklassniki:hover{background-position:-4px -28px}.b-share_theme_dark .b-share-popup .b-share-icon_vkontakte,.b-share_theme_dark .b-share-icon_vkontakte:hover{background-position:-24px -28px}.b-share_theme_dark .b-share-popup .b-share-icon_twitter,.b-share_theme_dark .b-share-icon_twitter:hover{background-position:-44px -28px}.b-share_theme_dark .b-share-popup .b-share-icon_facebook,.b-share_theme_dark .b-share-icon_facebook:hover{background-position:-64px -28px}.b-share_theme_dark .b-share-popup .b-share-icon_lj,.b-share_theme_dark .b-share-icon_lj:hover{background-position:-85px -28px}.b-share_theme_dark .b-share-popup .b-share-icon_yaru,.b-share_theme_dark .b-share-icon_yaru:hover{background-position:-105px -28px}.b-share_theme_dark .b-share__text{color:#fff}.b-share_theme_dark .b-share-form-button_share .b-share-form-button__icon{background-image:url("//yandex.st/share/static/b-share-form-button_share__icon_dark.png")}.b-share_theme_dark .b-share-form-button{color:#fff!important;opacity:.8}.b-share_theme_dark .b-share__handle:hover .b-share-form-button,.b-share_theme_dark .b-share-form-button:hover{opacity:1;cursor:pointer}.b-share_theme_dark .b-share-form-button,.b-share_theme_dark .b-share-form-button__before,.b-share_theme_dark .b-share-form-button__after{background:transparent}.b-share_theme_dark .b-share-popup__i{background-color:#333;border-radius:10px;-webkit-box-shadow:0 2px 9px rgba(255,255,255,0.6);-moz-box-shadow:0 2px 9px rgba(255,255,255,0.6);box-shadow:0 2px 9px rgba(255,255,255,0.6)}.b-share_theme_dark .b-share__text{color:#AAA}.b-share_theme_dark .b-share-popup{color:#AAA;border-radius:10px;background-color:#333;background-color:rgba(50,50,50,0.3)}.b-share_theme_dark .b-share-popup__item{background:transparent;color:#ccc}.b-share_theme_dark .b-share-popup .b-share-popup__item__text{color:#ccc}.b-share_theme_counter .b-share{display:inline-block;vertical-align:middle}.b-share-counter{display:none;float:left;margin:3px 6px 3px 3px;color:#fff;font:14px Arial,sans-serif;line-height:18px}.b-share_theme_counter .b-share_type_small .b-share-counter{margin:2px 6px 2px 1px;font-size:11px;line-height:14px}.b-share_theme_counter .b-share-btn__counter .b-share-counter{display:block}.b-share-btn__counter{text-decoration:none}.b-share_theme_counter .b-share-btn__wrap{position:relative;float:left;margin-left:5px}.b-share_theme_counter .b-share_type_small .b-share-btn__wrap{margin-left:4px}.b-share_theme_counter .b-share-btn__wrap:first-child{margin-left:0}.b-share_theme_counter .b-share__link{display:inline-block;cursor:pointer;-webkit-border-radius:3px;border-radius:3px}.b-share_theme_counter .b-share_type_small .b-share__link{-webkit-border-radius:2px;border-radius:2px}.b-share_theme_counter .b-share-icon{display:block;float:left;width:24px;height:24px;background-image:url(//yandex.st/share/static/b-share_counter_large.png);background-position:-20px 0}.b-share_theme_counter .b-share_type_small .b-share-icon{width:18px;height:18px;background-image:url(//yandex.st/share/static/b-share_counter_small.png)}.b-share_theme_counter .b-share-icon_facebook{background-position:0 0}.b-share_theme_counter .b-share-btn__facebook{background-color:#3c5a98}.b-share_theme_counter .b-share-btn__facebook:hover{background-color:#30487a}.b-share_theme_counter .b-share-btn__facebook:active{border-top:2px solid #24365a;background-color:#334d81}.b-share_theme_counter .b-share-icon_moimir{background-position:0 -29px}.b-share_theme_counter .b-share-btn__moimir{background-color:#226eb7}.b-share_theme_counter .b-share-btn__moimir:hover{background-color:#1b5892}.b-share_theme_counter .b-share-btn__moimir:active{border-top:2px solid #14426d;background-color:#1d5e9c}.b-share_theme_counter .b-share-icon_vkontakte{background-position:0 -58px}.b-share_theme_counter .b-share-btn__vkontakte{background-color:#48729e}.b-share_theme_counter .b-share-btn__vkontakte:hover{background-color:#3a5b7e}.b-share_theme_counter .b-share-btn__vkontakte:active{border-top:2px solid #2b445e;background-color:#3d6186}.b-share_theme_counter .b-share-icon_twitter{background-position:0 -87px}.b-share_theme_counter .b-share-btn__twitter{background-color:#00aced}.b-share_theme_counter .b-share-btn__twitter:hover{background-color:#008abe}.b-share_theme_counter .b-share-btn__twitter:active{border-top:2px solid #00668d;background-color:#0092ca}.b-share_theme_counter .b-share-icon_odnoklassniki{background-position:0 -116px}.b-share_theme_counter .b-share-btn__odnoklassniki{background-color:#ff9f4d}.b-share_theme_counter .b-share-btn__odnoklassniki:hover{background-color:#cc7f3e}.b-share_theme_counter .b-share-btn__odnoklassniki:active{border-top:2px solid #975e2e;background-color:#d98742}.b-share_theme_counter .b-share-icon_gplus{background-position:0 -145px}.b-share_theme_counter .b-share-btn__gplus{background-color:#c25234}.b-share_theme_counter .b-share-btn__gplus:hover{background-color:#9b422a}.b-share_theme_counter .b-share-btn__gplus:active{border-top:2px solid #73311f;background-color:#a5462c}.b-share_theme_counter .b-share-icon_yaru{background-position:0 -174px}.b-share_theme_counter .b-share-btn__yaru{background-color:#d83933}.b-share_theme_counter .b-share-btn__yaru:hover{background-color:#ad2e29}.b-share_theme_counter .b-share-btn__yaru:active{border-top:2px solid #80221e;background-color:#b8312b}.b-share_theme_counter .b-share__link:active{height:22px}.b-share_theme_counter .b-share_type_small .b-share__link:active{height:16px}.b-share_theme_counter .b-share__link:active .b-share-icon,.b-share_theme_counter .b-share__link:active .b-share-counter{position:relative;top:-1px}.b-share_theme_counter .b-share__link::after{position:absolute;top:0;right:0;bottom:0;left:0;content:"";background-image:url(data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==)}.b-share_theme_counter .b-share__handle{height:auto;padding:0!important}',
            d = ".b-share-popup__i,.b-share-popup__icon,.b-share-popup__main,.b-share-popup_full .b-share-popup__extra{zoom:1;display:inline}.b-share-popup_to-left{left:0}.b-share-popup_to-right .b-share-popup__expander{direction:ltr}.b-share-popup_to-right .b-share-popup__expander .b-share-popup__item{direction:rtl}.b-share-popup__icon{margin-top:-1px}.b-share-popup__icon_input{margin-top:-4px}.b-share-popup__icon__input{width:14px}.b-share-popup__spacer{overflow:hidden;font:1px/1 Arial}.b-share-popup__input__input{width:100px;direction:ltr}.b-share-popup_full .b-share-popup__input_link .b-share-popup__input__input,.b-share-popup_full .b-share-popup__form .b-share-popup__input__input{width:200px}.b-share-popup-wrap{margin-bottom:25px}.b-share-popup__form{direction:ltr}.b-share-popup__form__button,.b-share-popup__form__close,.b-share-popup__form__link{float:none;display:inline-block}.b-share-popup_full .b-share-popup__form__close{margin-left:70px}* HTML .b-share-popup_up .b-share-popup__tail{overflow:hidden;bottom:-10px}* html .b-share-form-button{text-decoration:none!important}.b-share-form-button{position:relative;overflow:visible}.b-share-form-button__before,.b-share-form-button__after{top:0}button.b-share-form-button .b-share-form-button__before,button.b-share-form-button .b-share-form-button__after{margin-top:auto}.b-share-form-button__icon{top:0}.b-share{zoom:1;display:inline}* HTML .b-share-form-button_share .b-share-form-button__icon{margin-top:-1px;background-image:url(//yandex.st/share/static/b-share-form-button_share__icon.gif)}";
        var b = document.createElement("style");
        b.type = "text/css";
        b.id = "ya_share_style";
        if (b.styleSheet) {
            b.styleSheet.cssText = a.browser === "msie" && (a.version < 8 || a2.documentMode < 8) ? c + d : c
        } else {
            b.appendChild(a2.createTextNode(c))
        }
        c = d = "";
        aR.appendChild(b);
        aN = function () {}
    }
    var aX = function () {}, av = null,
        az = "getElementsByTagName",
        aS = encodeURIComponent,
        aR = a2[az]("head")[0] || a2.body,
        a1 = "//yandex.st/share",
        aW = "http://share.yandex.ru",
        aT = {
            az: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Moy Kruq",
                moimir: "Moy Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklassniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "YA TUT!",
                twitter: "Twitter",
                vkontakte: "ВКонтакте",
                yaru: "Ya.ru",
                yazakladki: "Yandex.ru"
            },
            be: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Мой Круг",
                moimir: "Мой Мир",
                myspace: "MySpace",
                odnoklassniki: "Аднакласнікі",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Я ТУТ!",
                twitter: "Twitter",
                vkontakte: "ВКонтакте",
                yaru: "Я.ру",
                yazakladki: "Яндекс.Закладкі"
            },
            en: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Moi Krug",
                moimir: "Moi Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklassniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Tut.by",
                twitter: "Twitter",
                vkontakte: "VKontakte",
                yaru: "Ya.ru",
                yazakladki: "Yandex.Bookmarks"
            },
            hy: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Moi Krug",
                moimir: "Moi Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklassniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "YA TUT",
                twitter: "Twitter",
                vkontakte: "VKontakte",
                yaru: "Ya.Ru",
                yazakladki: "Yandex.ru"
            },
            ka: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Moi Krug",
                moimir: "Moi Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklasniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Ya Tut!",
                twitter: "Twitter",
                vkontakte: "VKontakte",
                yaru: "Ya.ru",
                yazakladki: "Yandex.ru"
            },
            kk: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "Friendfeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Мой Круг",
                moimir: "Мой Мир",
                myspace: "MySpace",
                odnoklassniki: "Одноклассники",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Я ТУТ!",
                twitter: "Twitter",
                vkontakte: "ВКонтакте",
                yaru: "Я.ру",
                yazakladki: "Яндекс.Бетбелгілер"
            },
            ro: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Moi Krug",
                moimir: "Moi Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklassniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "YA TUT!",
                twitter: "Twitter",
                vkontakte: "VKontakte",
                yaru: "Ya.ru",
                yazakladki: "Yandex.ru"
            },
            ru: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Мой Круг",
                moimir: "Мой Мир",
                myspace: "MySpace",
                odnoklassniki: "Одноклассники",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Я ТУТ!",
                twitter: "Twitter",
                vkontakte: "ВКонтакте",
                yaru: "Я.ру",
                yazakladki: "Яндекс.Закладки"
            },
            tr: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook ",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal ",
                moikrug: "Moy Krug",
                moimir: "Moi Mir",
                myspace: "MySpace",
                odnoklassniki: "Odnoklasniki",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Tut.by!",
                twitter: "Twitter ",
                vkontakte: "VKontakte ",
                yaru: "Ya.ru",
                yazakladki: "Yandex.Favoriler"
            },
            tt: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Мой Круг",
                moimir: "Мой Мир",
                myspace: "MySpace",
                odnoklassniki: "Одноклассники",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Я ТУТ!",
                twitter: "Twitter",
                vkontakte: "ВКонтакте",
                yaru: "Я.ру",
                yazakladki: "Яндекс.Кыстыргычлар"
            },
            uk: {
                blogger: "Blogger",
                delicious: "delicious",
                diary: "Diary",
                digg: "Digg",
                evernote: "Evernote",
                facebook: "Facebook",
                friendfeed: "FriendFeed",
                gbuzz: "Google Buzz",
                gplus: "Google Plus",
                greader: "Google Reader",
                juick: "Juick",
                linkedin: "LinkedIn",
                liveinternet: "LiveInternet",
                lj: "LiveJournal",
                moikrug: "Мой Круг",
                moimir: "Мой Мир",
                myspace: "MySpace",
                odnoklassniki: "Однокласники",
                pinterest: "Pinterest",
                pocket: "Pocket",
                surfingbird: "Surfingbird",
                tutby: "Я ТУТ!",
                twitter: "Twitter",
                vkontakte: "ВКонтакті",
                yaru: "Я.ру",
                yazakladki: "Яндекс.Закладки"
            }
        }, a8 = {
            en: {
                close: "close",
                "code blog": "Blog code",
                link: "Link",
                share: "Share",
                "share with friends": "Share with friends"
            },
            ru: {
                close: "закрыть",
                "code blog": "Код для блога",
                link: "Ссылка",
                share: "Поделиться",
                "share with friends": "Поделитесь с друзьями"
            },
            uk: {
                close: "закрити",
                "code blog": "Код для блогу",
                link: "Посилання",
                share: "Поділитися",
                "share with friends": "Поділіться з друзями"
            }
        };
    aT.custom = {};

    function a9(a) {
        var b = {
            counter: ["button", "small"],
            "default": ["button", "block", "link", "icon", "none"]
        }, c = (a.theme && b[a.theme] || b["default"]).join(" ");
        if (!a || (!a.element && !a.elementID)) {
            throw new Error("Invalid parameters")
        }
        a.element = a.element || a.elementID;
        if (typeof a.element === "string") {
            a.element = a2.getElementById(a.element)
        } else {
            if (!a.element.nodeType === 1) {
                a.element = null
            }
        } if (!a.elementStyle) {
            a.elementStyle = {};
            if (a.style) {
                a.elementStyle.type = a.style.button === false ? "link" : "button";
                a.elementStyle.linkUnderline = a.style.link;
                a.elementStyle.border = a.style.border;
                a.elementStyle.linkIcon = a.style.icon
            }
        }
        a.elementStyle = a.elementStyle;
        if (!a.elementStyle.type || c.indexOf(a.elementStyle.type) === -1) {
            a.elementStyle.type = "button"
        }
    }

    function aB() {
        var a = location.hostname.split(".").splice(-1, 1)[0];
        switch (a) {
        case "by":
            a = "be";
            break;
        case "kz":
            a = "kk";
            break;
        case "ua":
            a = "uk";
            break;
        default:
            a = "ru"
        }
        return a
    }

    function aZ(b) {
        var c, a;
        for (c in b) {
            a = b[c];
            if (b.hasOwnProperty(c) && !(c in aT.custom || c in aT.ru)) {
                if (a && a.url && a.title && (a.icon_16 || a.icon_from)) {
                    aT.custom[c] = a
                } else {
                    throw new Error("Invalid new service declaration")
                }
            }
        }
    }

    function ay(e, v) {
        aN();
        a9(e);
        if (!e.element || e.element.yashareInited) {
            return
        }
        e.element.yashareInited = true;
        var E = e.element;
        var H, t, a = e.l10n,
            x = (e.link || aM.location) + "",
            m = e.elementStyle,
            F = m.quickServices || e.services || ["|", "yaru", "vkontakte", "odnoklassniki", "twitter", "facebook", "moimir", "lj"],
            b = e.title || a2.title,
            o = e.serviceSpecific || e.override || {}, f = e.popupStyle || e.popup || {}, G = f.codeForBlog,
            g = f.blocks || ["yaru", "vkontakte", "odnoklassniki", "twitter", "facebook", "moimir", "lj", "gplus"],
            z = f.copyPasteField || f.input,
            A = "ya-share-" + Math.random() + "-" + +(new Date()),
            q = !/(?:moikrug\.ru|ya\.ru|yandex\.by|yandex\.com|yandex\.com\.tr|yandex\.kz|yandex\.net|yandex\.ru|yandex\.ua|yandex-team\.ru)$/.test(location.hostname),
            i, C = e.servicesDeclaration;
        if (!a || !(a in a8)) {
            a = aB()
        }
        t = a8[a];
        if (!q && C) {
            aZ(C)
        }
        var u = m.afterIconsText;
        if (u) {
            m.type = "text"
        }
        H = m.text || e.text || (t.share + (m.type == "button" ? "\u2026" : ""));
        H = am(H);
        if (Object.prototype.toString.call(g) === "[object Array]") {
            var w = g;
            g = {};
            g[t["share with friends"]] = w;
            w = null
        }
        switch (typeof G) {
        case "string":
            var n = G;
            G = {};
            G[t["code blog"]] = n;
            break;
        case "object":
            for (var c in G) {
                break
            }
            if (!c) {
                G = null
            }
            break;
        default:
            G = null
        }
        var s = ' id="' + A + '" data-hdirection="' + (f.hDirection || "") + '" data-vdirection="' + (f.vDirection || "") + '"';
        if (e.theme == "counter") {
            var p, k, d, D, l = ['<span class="b-share' + (m.type == "small" ? " b-share_type_small" : "") + '">'];
            for (p = 0, k = F.length; p < k; p++) {
                d = F[p];
                d = a7({
                    serviceName: d,
                    serviceTitle: ax(d, "serviceTitle", "", o),
                    link: ax(d, "link", x, o),
                    title: ax(d, "title", b, o),
                    description: ax(d, "description", e.description || "", o),
                    image: ax(d, "image", e.image || "", o),
                    lang: a,
                    theme: "counter"
                });
                if (d) {
                    l.push('<span class="b-share-btn__wrap">' + d + "</span>")
                }
            }
            if (window.postMessage) {
                l.push('<iframe style="display: none" src="' + a1 + "/ya-share-cnt.html?url=" + encodeURIComponent(x) + "&services=" + F.join(",") + '"></iframe>')
            }
            aY(aM, "message", v.onMessage);
            E.setAttribute("data-yasharelink", E.getAttribute("data-yasharelink") || x)
        } else {
            var p, k, d, l = ['<span class="b-share' + (m.type == "block" ? " b-share-form-button b-share-form-button_icons" : "") + (m.border ? " b-share_bordered" : "") + (m.linkUnderline ? " b-share_link" : "") + '"' + (m.background ? ' style="background:' + m.background + '"' : "") + ">" + ((m.type !== "none" && m.type !== "text") ? '<a class="b-share__handle"' + s + ">" : "")];
            if (m.type == "block") {
                l = ['<div class="b-share"><span class="b-share-form-button b-share-form-button_icons"><i class="b-share-form-button__before"></i>']
            } else {
                if (m.type == "button") {
                    l.push('<span class="b-share-form-button b-share-form-button_share"><i class="b-share-form-button__before"></i><i class="b-share-form-button__icon"></i>' + H + '<i class="b-share-form-button__after"></i></span>')
                } else {
                    if (m.type === "link" || m.type === "text") {
                        l.push('<span class="b-share__text' + (m.type === "text" ? " b-share__handle b-share__handle_cursor_default" : "") + (m.linkUnderline === "dotted" ? " b-share-pseudo-link" : "") + '">')
                    }
                    if (((m.type === "link" || m.type === "text") && m.linkIcon) || m.type === "icon") {
                        l.push('<img alt="" class="b-share-icon" src="' + a1 + '/static/b-share.png"/>')
                    }
                    if (m.type === "link" || m.type === "text") {
                        l.push(H + "</span>")
                    }
                }
            } if (m.type !== "none" && m.type !== "text") {
                l.push("</a>")
            }
            if (m.group) {
                l.push('<span class="b-share__group">')
            }
            for (p = 0, k = F.length; p < k; p++) {
                d = F[p];
                l.push(a7({
                    serviceName: d,
                    serviceTitle: ax(d, "serviceTitle", "", o),
                    link: ax(d, "link", x, o),
                    title: ax(d, "title", b, o),
                    description: ax(d, "description", e.description || "", o),
                    image: ax(d, "image", e.image || "", o),
                    lang: a
                }))
            }
            if (m.group) {
                l.push("</span>")
            }
            if (m.type == "block") {
                u = "Ў";
                l.push('<a class="b-share__handle b-share__handle_more" title="Ещё" ' + s + '><span class="__b-share__handle_more">' + u + "</span></a>");
                l.push('<i class="b-share-form-button__after"></i>')
            } else {
                if (u) {
                    l.push('<a class="b-share__handle b-share_link"' + s + '><span class="b-share__text b-share-pseudo-link">' + u + "</span></a>")
                }
            }
            l.push("</span>");
            if (m.type == "block") {
                l.push("</div>")
            }
        }
        E.innerHTML = l.join("");
        if (e.theme) {
            aA(E, "b-share_theme_" + e.theme.replace(/\"/g, ""))
        }
        aF(E, v, u, m.type === "none" || e.theme === "counter");
        if (e.theme != "counter" && m.type !== "none") {
            var h = ['<div class="b-share-popup-wrap b-share-popup-wrap_state_hidden' + (e.theme ? " b-share_theme_" + e.theme.replace(/\"/g, "") : "") + '" id="' + A + '-popup"><div class="b-share-popup b-share-popup_down b-share-popup_to-right"><div class="b-share-popup__i' + (z ? " b-share-popup_with-link" : "") + '">'];
            if (G) {
                h.push('<div class="b-share-popup__form b-share-popup__form_html">');
                for (var r in G) {
                    if (G.hasOwnProperty(r)) {
                        h.push('<label class="b-share-popup__input">' + r + '<textarea class="b-share-popup__input__input" cols="10" rows="5">' + G[r] + "</textarea></label>")
                    }
                }
                h.push('<a class="b-share-popup__form__close">' + t.close + "</a></div>")
            }
            h.push('<div class="b-share-popup__main ' + (q ? " b-share-popup_yandexed" : "") + '">');
            if (z) {
                h.push('<label class="b-share-popup__input b-share-popup__input_link">' + t.link + '<input class="b-share-popup__input__input" readonly="readonly" type="text" value="' + am(x) + '" /></label>')
            }
            for (var j in g) {
                if (g.hasOwnProperty(j)) {
                    var B = g[j];
                    k = B.length;
                    if (k) {
                        if (j) {
                            h.push('<div class="b-share-popup__header b-share-popup__header_first">' + j + "</div>")
                        }
                        for (p = 0; p < k; p++) {
                            d = B[p];
                            h.push(aw({
                                serviceName: d,
                                serviceTitle: ax(d, "serviceTitle", "", o),
                                link: ax(d, "link", x, o),
                                title: ax(d, "title", b, o),
                                description: ax(d, "description", e.description || "", o),
                                image: ax(d, "image", e.image || "", o),
                                lang: a
                            }))
                        }
                    }
                }
            }
            if (G) {
                h.push('<div class="b-share-popup__spacer"></div><a class="b-share-popup__item b-share-popup__item_type_code"><span class="b-share-popup__icon"><span class="b-share-icon b-share-icon_html"></span></span><span class="b-share-popup__item__text">' + t["code blog"] + "</span></a>")
            }
            if (q) {
                h.push('<a href="http://api.yandex.ru/share/" class="b-share-popup__yandex">\u042F\u043D\u0434\u0435\u043A\u0441</a>')
            }
            h.push("</div>");
            h.push('</div><div class="b-share-popup__tail"></div></div></div>');
            var y = a2.createElement("div"),
                I;
            y.innerHTML = h.join("");
            I = y.firstChild;
            a2.body.appendChild(I);
            y = null;
            au(I, v)
        }
        return [E, I]
    }

    function aD(a) {
        var b = a2.createElement("script");
        b.setAttribute("src", location.protocol + "//clck.yandex.ru/jclck/dtype=stred/pid=52/cid=70685/path=" + a + "/rnd=" + Math.round(Math.random() * 100000) + "/*" + encodeURIComponent(location.href));
        aR.appendChild(b)
    }

    function ax(c, d, b, a) {
        var e = b,
            f = a[c];
        if (f && d in f) {
            e = f[d]
        }
        return (d == "description" || d == "image" || d == "serviceTitle") ? e : aS(e)
    }

    function aU(a) {
        return Boolean(aT.custom[a] && aT.custom[a]["title"])
    }

    function a6(a, d) {
        var b = aT.custom[a] || an(a, d);
        var c = "";
        var e = "";
        if (aU(a)) {
            if (b.icon_from) {
                c += b.icon_from
            } else {
                c += "custom";
                e = ' style="background-image:url(' + b.icon_16 + ");" + (b.icon_16_css ? b.icon_16_css : "") + '"'
            }
        } else {
            c += a
        }
        return '<span class="b-share-icon b-share-icon_' + c + '"' + e + "></span>"
    }

    function an(b, a) {
        a = a || "ru";
        return aT.custom[b] ? aT.custom[b].title : aT[a] && aT[a][b]
    }

    function a0(c, g, d, h, e) {
        e = e ? aS(e) : "";
        h = h ? aS(h) : "";
        var b = aW + "/go.xml?service=" + c;
        if (aU(c)) {
            var a = aT.custom[c];
            var f = a.url.replace("{link}", g).replace("{title}", d).replace("{description}", h).replace("{image}", e);
            if (a.directLink) {
                return f
            } else {
                return b + "&amp;goto=" + aS(f)
            }
        } else {
            return b + "&amp;url=" + g + "&amp;title=" + d + (h ? "&amp;description=" + h : "") + (e ? "&amp;image=" + e : "")
        }
    }

    function a7(f, d, b, a, h) {
        var c, i, g;
        if (arguments.length == 1 && typeof arguments[0] == "object") {
            var e = arguments[0];
            i = e.lang;
            c = e.serviceTitle;
            f = e.serviceName;
            d = e.link;
            b = e.title;
            a = e.description;
            h = e.image;
            g = e.theme
        }
        if (f == "pinterest" && !h) {
            return ""
        }
        if (f in aT[i || "ru"] || f in aT.custom) {
            return '<a rel="nofollow" target="_blank" title="' + (c || an(f, i)) + '" class="b-share__handle b-share__link b-share-btn__' + f + '" href="' + a0(f, d, b, a, h) + '" data-service="' + f + '">' + a6(f) + (g == "counter" ? '<span class="b-share-counter"></span>' : "") + "</a>"
        } else {
            if (f == "|") {
                return '<span class="b-share__hr"></span>'
            }
        }
    }

    function aw(a, g, d, h, f) {
        var c, e;
        if (arguments.length == 1 && typeof arguments[0] == "object") {
            var b = arguments[0];
            e = b.lang;
            c = b.serviceTitle;
            a = b.serviceName;
            g = b.link;
            d = b.title;
            h = b.description;
            f = b.image
        }
        if (a == "pinterest" && !f) {
            return ""
        }
        if (a in aT[e || "ru"] || a in aT.custom) {
            return '<a rel="nofollow" target="_blank" href="' + a0(a, g, d, h, f) + '" class="b-share-popup__item" data-service="' + a + '"><span class="b-share-popup__icon">' + a6(a) + '</span><span class="b-share-popup__item__text">' + (c || an(a, e)) + "</span></a>"
        } else {
            if (a == "|") {
                return '<div class="b-share-popup__spacer"></div>'
            }
        }
    }
    var aV;

    function at() {
        aM.clearTimeout(aV)
    }

    function aK(a) {
        aV = aM.setTimeout(a.onDocumentClick, 2000)
    }

    function au(d, a) {
        var f, h, g = aL(d, "b-share-popup__expander")[0],
            e = aL(d, "b-share-popup__item");
        if (g) {
            aY(g.firstChild, "click", aq)
        }
        for (f = 0, h = e.length; f < h; f++) {
            aY(e[f], "click", a.onshare)
        }
        ap(d[az]("input"));
        ap(d[az]("textarea"));
        var c = aL(d, "b-share-popup__item_type_code")[0];
        if (c) {
            var b = aL(d, "b-share-popup__i")[0];
            aY(c, "click", function (i) {
                aA(b, "b-share-popup_show_form_html");
                ar(i)
            });
            aY(aL(d, "b-share-popup__form__close")[0], "click", function (i) {
                aO(b, "b-share-popup_show_form_html");
                ar(i)
            })
        }
        aQ(d, at);
        ak(d, a.setPopupCloseTimeout)
    }

    function ap(c) {
        var d = 0,
            a = c.length,
            b;
        for (; d < a; d++) {
            b = c[d];
            aY(b, "click", (function (e) {
                return function () {
                    e.select()
                }
            })(b))
        }
    }

    function aF(h, f, i, c) {
        var d = 1,
            e, g = aL(h, "b-share__handle");
        var j = g.length;
        var a = j;
        if (c) {
            d = 0
        } else {
            var b = g[0];
            if (i) {
                b = g[j - 1];
                a--
            }
            aY(b, "click", f.toggleOpenMode);
            aQ(b, at);
            ak(b, f.setPopupCloseTimeout)
        }
        for (d, e = a; d < e; d++) {
            aY(g[d], "click", f.onshare)
        }
    }

    function ah(d) {
        var b, c, a;
        if (!(b = d.currentTarget)) {
            a = d.target || d.srcElement;
            if (!(b = aH(a, "b-share__handle"))) {
                b = aH(a, "b-share-popup__item")
            }
        }
        if (b && (c = b.getAttribute("data-service"))) {
            aD(c);
            switch (c) {
            case "facebook":
                aE(d, b, 800, 500);
                break;
            case "moimir":
                aE(d, b, 560, 400);
                break;
            case "twitter":
                aE(d, b, 650, 520);
                break;
            case "vkontakte":
                aE(d, b, 550, 420);
                break;
            case "odnoklassniki":
                aE(d, b, 560, 370);
                break;
            case "gplus":
                aE(d, b, 560, 370);
                break;
            case "surfingbird":
                aE(d, b, 500, 170);
                break
            }
        }
        return c
    }

    function aE(d, b, a, c) {
        ar(d);
        window.open(b.href, "yashare_popup", "scrollbars=1,resizable=1,menubar=0,toolbar=0,status=0,left=" + ((screen.width - a) / 2) + ",top=" + ((screen.height - c) / 2) + ",width=" + a + ",height=" + c).focus()
    }

    function aq() {
        var a = aH(this, "b-share-popup__i");
        a4(a, "b-share-popup_full")
    }

    function bb(a, c) {
        if (a && typeof a !== "number") {
            var b = a.which ? a.which : 1;
            if (b !== 1 || aH(a.target || a.srcElement, "b-share-popup-wrap")) {
                return
            }
        }
        if (av) {
            c.closePopup(av.id)
        }
    }

    function bc(d, g) {
        d = d.replace("-popup", "");
        var a = a2.getElementById(d),
            b = a2.getElementById(d + "-popup"),
            c = aL(b, "b-share-popup__input__input");
        aO(a, "b-share-popup_opened");
        aO(a, "b-share-form-button_state_pressed");
        aA(b, "b-share-popup-wrap_state_hidden");
        aO(b, "b-share-popup-wrap_state_visibale");
        b.style.cssText = "";
        if (c) {
            for (var e = 0, f = c.length; e < f; e++) {
                c[e].style.cssText = ""
            }
        }
        b.firstChild.className = "b-share-popup";
        ba(a2, "click", g.onDocumentClick);
        av = null;
        g.onclose(g._this)
    }

    function aC(r, m, a) {
        a = a || {};
        var n = a.hDirection || r.getAttribute("data-hdirection"),
            f = a.vDirection || r.getAttribute("data-vdirection"),
            c = a2.getElementById(r.id + "-popup"),
            o = c.firstChild,
            p = aL(c, "b-share-popup__input__input"),
            q = al(),
            e, d, j = aP(r);
        if (n === "left" || n === "right") {
            e = n
        } else {
            e = (j.left - Math.max(a3.scrollLeft, a2.body.scrollLeft)) >= q.width / 2 ? "left" : "right"
        } if (f === "up" || f === "down") {
            d = f
        } else {
            d = (j.top - Math.max(a3.scrollTop, a2.body.scrollTop)) >= q.height / 2 ? "up" : "down"
        }
        m.onDocumentClick();
        var l = aL(c, "b-share-popup__tail")[0],
            h = Math.round(r.offsetWidth / 2),
            k = a.width || o.offsetWidth,
            s = Math.round(k / 2);
        if (j.left - (s - h) > 5) {
            j.left -= Math.round(s - h);
            var b = Math.max(j.left + k - a2.body.offsetWidth, 0);
            j.left -= b;
            h = s - 10 + b
        }
        j.top += (d === "up" ? -9 : 9 + r.offsetHeight);
        c.style.cssText = "top:" + (a.top || j.top) + "px;left:" + (a.left || j.left) + "px;width:" + k + "px";
        l.style.cssText = "left: " + h + "px";
        if (p) {
            for (var g = 0, i = p.length; g < i; g++) {
                p[g].style.width = (k - 30) + "px"
            }
        }
        o.className = "b-share-popup b-share-popup_" + d + " b-share-popup_to-" + e;
        aA(c, "b-share-popup-wrap_state_visibale");
        aO(c, "b-share-popup-wrap_state_hidden");
        aA(r, "b-share-popup_opened");
        aA(r, "b-share-form-button_state_pressed");
        o.firstChild.style.zoom = 1;
        aM.setTimeout(function () {
            aY(a2, "click", m.onDocumentClick)
        }, 50);
        aD("share");
        av = c;
        m.onopen(m._this)
    }

    function aG(a, b) {
        var c = a.currentTarget || aH(a.target || a.srcElement, "b-share__handle");
        if (ai(c, "b-share-popup_opened")) {
            b.closePopup(c.id, b)
        } else {
            if (b.onbeforeopen(b._this) !== false) {
                b.openPopup(c, b)
            }
        }
        ar(a);
        ao(a)
    }
    if (!("Ya" in aM)) {
        aM.Ya = {}
    }
    Ya.share = function (e) {
        if (!(this instanceof Ya.share)) {
            return new Ya.share(e)
        }
        if (e) {
            a1 = e.STATIC_HOST || a1;
            aW = e.SHARE_HOST || aW
        }
        this._loaded = false;
        var d = this,
            a = e.onshare || aX,
            f = e.onBeforeShare || null,
            c = {
                onready: e.onready || e.onload || aX,
                onbeforeclose: e.onbeforeclose || aX,
                onclose: e.onclose || aX,
                onbeforeopen: e.onbeforeopen || aX,
                onopen: e.onopen || aX,
                onshare: function (h) {
                    if (f) {
                        try {
                            if (f(d) === false) {
                                h.preventDefault();
                                return false
                            }
                        } catch (i) {
                            h.preventDefault();
                            return false
                        }
                    }
                    var j = ah(h);
                    if (j) {
                        d.incrementCounter(j);
                        a(j, d)
                    }
                },
                _this: d
            };
        c.onMessage = function (h) {
            d.onMessage(h)
        };

        function b(h) {
            h = ("" + h).replace(/\s/g, "").match(/^\-?\d+\+?/);
            return h && h[0]
        }

        function g(i) {
            var h = new RegExp("(\\d)(\\d{3})( |\\+|$)", "g");
            return h.test("" + i) ? g(("" + i).replace(h, function (k, j) {
                return arguments[1] + " " + arguments[2] + arguments[3]
            })) : i
        }
        this.onMessage = function (i) {
            try {
                var j = a1.match(/\/\/([^\/]+)(\/|$)/);
                if (i && i.data && (i.origin.match(RegExp("//" + (j && j[1].replace(".", "\\.") + "$"))) || i.origin == window.location.origin)) {
                    var h = ("" + i.data).split("|"),
                        k = {};
                    if (h.length != 3) {
                        return
                    }
                    k.service = h.shift();
                    k.counter = b(h.shift());
                    k.url = h.join("|");
                    if (k.url.length && k.service) {
                        d.showCounter(k)
                    }
                }
            } catch (i) {}
        };
        this.incrementCounter = function (k) {
            if (!window.postMessage) {
                return false
            }
            var i = aL(d._block, "b-share-btn__" + k)[0],
                h = i ? aL(i, "b-share-counter")[0] : false,
                j = h && b(h.innerHTML || "0");
            if (h && j && /^[\d ]+$/.test(j)) {
                j = parseInt(b(j) || 0, 10) + 1;
                h.innerHTML = g("" + j);
                aA(i, "b-share-btn__counter")
            }
        };
        this.showCounter = function (i) {
            var j = aL(d._block, "b-share-btn__" + i.service)[0],
                h = j ? aL(j, "b-share-counter")[0] : false;
            if (h && d._block.getAttribute("data-yasharelink") == i.url) {
                h.innerHTML = g(i.counter) || "";
                if (i.counter < 0) {
                    h.parentNode.removeChild(h)
                } else {
                    if (i.counter && i.counter != "0") {
                        aA(j, "b-share-btn__counter")
                    } else {
                        aO(j, "b-share-btn__counter")
                    }
                }
            } else {}
        };
        c.toggleOpenMode = function (h) {
            aG(h, c)
        };
        c.closePopup = function (h) {
            at();
            if (c.onbeforeclose(d) !== false) {
                bc(h, c)
            }
        };
        c.openPopup = function (i, h) {
            aC(i, h)
        };
        c.onDocumentClick = function (h) {
            bb(h, c)
        };
        c.setPopupCloseTimeout = function () {
            aK(c)
        };
        this.closePopup = function () {
            bc(this._popup.id, c)
        };
        this.openPopup = function (h) {
            aC(aL(this._block, "b-share__handle")[0], c, h)
        };
        a5(function () {
            var h = ay(e, c);
            e = null;
            if (!h) {
                return
            }
            d._block = h[0];
            d._popup = h[1];
            d._loaded = true;
            c.onready(d)
        })
    };
    Ya.share.prototype = {
        updateShareLink: function (e, d, b) {
            if (!this._loaded) {
                return this
            }
            var h, i, a, g, c = "",
                j = "";
            if (arguments.length == 1 && typeof arguments[0] == "object") {
                var f = arguments[0];
                e = f.link || aM.location.toString();
                d = f.title || a2.title;
                c = f.description || "";
                j = f.image || "";
                b = f.serviceSpecific || {}
            } else {
                e = e || aM.location.toString();
                d = d || a2.title;
                b = b || {}
            }
            a = aL(this._block, "b-share__link");
            for (h = 0, i = a.length; h < i; h++) {
                g = a[h].getAttribute("data-service");
                a[h].href = a0(g, ax(g, "link", e, b), ax(g, "title", d, b), ax(g, "description", c, b), ax(g, "image", j, b))
            }
            if (this._popup) {
                a = aL(this._popup, "b-share-popup__item");
                for (h = 0, i = a.length; h < i; h++) {
                    g = a[h].getAttribute("data-service");
                    if (g) {
                        a[h].href = a0(g, ax(g, "link", e, b), ax(g, "title", d, b), ax(g, "description", c, b), ax(g, "image", j, b))
                    }
                }
                a = aL(this._popup, "b-share-popup__input__input");
                for (var h = a.length - 1; h >= 0; h--) {
                    if (a[h] && a[h].tagName.toLowerCase() !== "textarea") {
                        a[h].value = e
                    }
                }
            }
            return this
        },
        updateCustomService: function (b, a) {
            if (aT.custom[b] && aT.custom[b].url) {
                aT.custom[b].url = a;
                this.updateShareLink();
                return true
            }
            return false
        }
    };
    a5(function () {
        var d = aL(a2.body, "yashare-auto-init"),
            g = 0,
            b = d.length,
            f, a, c, e;
        for (; g < b; g++) {
            f = d[g];
            a = f.getAttribute("data-yashareQuickServices");
            c = f.getAttribute("data-yasharePopupServices");
            if (typeof a === "string") {
                a = a.split(",")
            } else {
                a = null
            }
            e = {
                element: f,
                theme: f.getAttribute("data-yashareTheme"),
                l10n: f.getAttribute("data-yashareL10n"),
                image: f.getAttribute("data-yashareImage"),
                link: f.getAttribute("data-yashareLink"),
                title: f.getAttribute("data-yashareTitle"),
                description: f.getAttribute("data-yashareDescription"),
                elementStyle: {
                    type: f.getAttribute("data-yashareType"),
                    quickServices: a
                }
            };
            if (c && typeof c === "string") {
                c = c.split(",");
                e.popupStyle = {
                    blocks: c
                }
            }
            new Ya.share(e)
        }
    });

    function am(a) {
        return (a || "").replace(/</g, "&lt;").replace(/"/g, "&quot;")
    }
})(window, document);