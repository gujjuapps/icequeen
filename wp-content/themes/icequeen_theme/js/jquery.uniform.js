! function(e, t, n) {
    "use strict";

    function s(e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return e.prop ? e.prop.apply(e, t) : e.attr.apply(e, t)
    }

    function a(e, t, n) {
        var s, a;
        for (s in n) n.hasOwnProperty(s) && (a = s.replace(/ |$/g, t.eventNamespace), e.bind(a, n[s]))
    }

    function r(e, t, n) {
        a(e, n, {
            focus: function() {
                t.addClass(n.focusClass)
            },
            blur: function() {
                t.removeClass(n.focusClass), t.removeClass(n.activeClass)
            },
            mouseenter: function() {
                t.addClass(n.hoverClass)
            },
            mouseleave: function() {
                t.removeClass(n.hoverClass), t.removeClass(n.activeClass)
            },
            "mousedown touchbegin": function() {
                e.is(":disabled") || t.addClass(n.activeClass)
            },
            "mouseup touchend": function() {
                t.removeClass(n.activeClass)
            }
        })
    }

    function i(e, t) {
        e.removeClass(t.hoverClass + " " + t.focusClass + " " + t.activeClass)
    }

    function l(e, t, n) {
        n ? e.addClass(t) : e.removeClass(t)
    }

    function u(e, t, n) {
        var s = "checked",
            a = t.is(":" + s);
        t.prop ? t.prop(s, a) : a ? t.attr(s, s) : t.removeAttr(s), l(e, n.checkedClass, a)
    }

    function o(e, t, n) {
        l(e, n.disabledClass, t.is(":disabled"))
    }

    function c(e, t, n) {
        switch (n) {
            case "after":
                return e.after(t), e.next();
            case "before":
                return e.before(t), e.prev();
            case "wrap":
                return e.wrap(t), e.parent()
        }
        return null
    }

    function d(e, n, a) {
        var r, i, l;
        return a || (a = {}), a = t.extend({
            bind: {},
            divClass: null,
            divWrap: "wrap",
            spanClass: null,
            spanHtml: null,
            spanWrap: "wrap"
        }, a), r = t("<div />"), i = t("<span />"), n.autoHide && e.is(":hidden") && "none" === e.css("display") && r.hide(), a.divClass && r.addClass(a.divClass), n.wrapperClass && r.addClass(n.wrapperClass), a.spanClass && i.addClass(a.spanClass), l = s(e, "id"), n.useID && l && s(r, "id", n.idPrefix + "-" + l), a.spanHtml && i.html(a.spanHtml), r = c(e, r, a.divWrap), i = c(e, i, a.spanWrap), o(r, e, n), {
            div: r,
            span: i
        }
    }

    function f(e, n) {
        var s;
        return n.wrapperClass ? (s = t("<span />").addClass(n.wrapperClass), s = c(e, s, "wrap")) : null
    }

    function p() {
        var n, s, a, r;
        return r = "rgb(120,2,153)", s = t('<div style="width:0;height:0;color:' + r + '">'), t("body").append(s), a = s.get(0), n = e.getComputedStyle ? e.getComputedStyle(a, "").color : (a.currentStyle || a.style || {}).color, s.remove(), n.replace(/ /g, "") !== r
    }

    function m(e) {
        return e ? t("<span />").text(e).html() : ""
    }

    function v() {
        return navigator.cpuClass && !navigator.product
    }

    function h() {
        return void 0 !== e.XMLHttpRequest ? !0 : !1
    }

    function C(e) {
        var t;
        return e[0].multiple ? !0 : (t = s(e, "size"), !t || 1 >= t ? !1 : !0)
    }

    function b() {
        return !1
    }

    function y(e, t) {
        var n = "none";
        a(e, t, {
            "selectstart dragstart mousedown": b
        }), e.css({
            MozUserSelect: n,
            msUserSelect: n,
            webkitUserSelect: n,
            userSelect: n
        })
    }

    function w(e, t, n) {
        var s = e.val();
        "" === s ? s = n.fileDefaultHtml : (s = s.split(/[\/\\]+/), s = s[s.length - 1]), t.text(s)
    }

    function g(e, t, n) {
        var s, a;
        for (s = [], e.each(function() {
                var e;
                for (e in t) Object.prototype.hasOwnProperty.call(t, e) && (s.push({
                    el: this,
                    name: e,
                    old: this.style[e]
                }), this.style[e] = t[e])
            }), n(); s.length;) a = s.pop(), a.el.style[a.name] = a.old
    }

    function k(e, t) {
        var n;
        n = e.parents(), n.push(e[0]), n = n.not(":visible"), g(n, {
            visibility: "hidden",
            display: "block",
            position: "absolute"
        }, t)
    }

    function H(e, t) {
        return function() {
            e.unwrap().unwrap().unbind(t.eventNamespace)
        }
    }
    var x = !0,
        A = !1,
        W = [{
            match: function(e) {
                return e.is("a, button, :submit, :reset, input[type='button']")
            },
            apply: function(t, n) {
                var l, u, c, f, p;
                return u = n.submitDefaultHtml, t.is(":reset") && (u = n.resetDefaultHtml), f = t.is("a, button") ? function() {
                    return t.html() || u
                } : function() {
                    return m(s(t, "value")) || u
                }, c = d(t, n, {
                    divClass: n.buttonClass,
                    spanHtml: f()
                }), l = c.div, r(t, l, n), p = !1, a(l, n, {
                    "click touchend": function() {
                        var n, a, r, i;
                        p || t.is(":disabled") || (p = !0, t[0].dispatchEvent ? (n = document.createEvent("MouseEvents"), n.initEvent("click", !0, !0), a = t[0].dispatchEvent(n), t.is("a") && a && (r = s(t, "target"), i = s(t, "href"), r && "_self" !== r ? e.open(i, r) : document.location.href = i)) : t.click(), p = !1)
                    }
                }), y(l, n), {
                    remove: function() {
                        return l.after(t), l.remove(), t.unbind(n.eventNamespace), t
                    },
                    update: function() {
                        i(l, n), o(l, t, n), t.detach(), c.span.html(f()).append(t)
                    }
                }
            }
        }, {
            match: function(e) {
                return e.is(":checkbox")
            },
            apply: function(e, t) {
                var n, s, l;
                return n = d(e, t, {
                    divClass: t.checkboxClass
                }), s = n.div, l = n.span, r(e, s, t), a(e, t, {
                    "click touchend": function() {
                        u(l, e, t)
                    }
                }), u(l, e, t), {
                    remove: H(e, t),
                    update: function() {
                        i(s, t), l.removeClass(t.checkedClass), u(l, e, t), o(s, e, t)
                    }
                }
            }
        }, {
            match: function(e) {
                return e.is(":file")
            },
            apply: function(e, n) {
                function l() {
                    w(e, p, n)
                }
                var u, f, p, m;
                return u = d(e, n, {
                    divClass: n.fileClass,
                    spanClass: n.fileButtonClass,
                    spanHtml: n.fileButtonHtml,
                    spanWrap: "after"
                }), f = u.div, m = u.span, p = t("<span />").html(n.fileDefaultHtml), p.addClass(n.filenameClass), p = c(e, p, "after"), s(e, "size") || s(e, "size", f.width() / 10), r(e, f, n), l(), v() ? a(e, n, {
                    click: function() {
                        e.trigger("change"), setTimeout(l, 0)
                    }
                }) : a(e, n, {
                    change: l
                }), y(p, n), y(m, n), {
                    remove: function() {
                        return p.remove(), m.remove(), e.unwrap().unbind(n.eventNamespace)
                    },
                    update: function() {
                        i(f, n), w(e, p, n), o(f, e, n)
                    }
                }
            }
        }, {
            match: function(e) {
                if (e.is("input")) {
                    var t = (" " + s(e, "type") + " ").toLowerCase(),
                        n = " color date datetime datetime-local email month number password search tel text time url week ";
                    return n.indexOf(t) >= 0
                }
                return !1
            },
            apply: function(e, t) {
                var n, a;
                return n = s(e, "type"), e.addClass(t.inputClass), a = f(e, t), r(e, e, t), t.inputAddTypeAsClass && e.addClass(n), {
                    remove: function() {
                        e.removeClass(t.inputClass), t.inputAddTypeAsClass && e.removeClass(n), a && e.unwrap()
                    },
                    update: b
                }
            }
        }, {
            match: function(e) {
                return e.is(":radio")
            },
            apply: function(e, n) {
                var l, c, f;
                return l = d(e, n, {
                    divClass: n.radioClass
                }), c = l.div, f = l.span, r(e, c, n), a(e, n, {
                    "click touchend": function() {
                        t.uniform.update(t(':radio[name="' + s(e, "name") + '"]'))
                    }
                }), u(f, e, n), {
                    remove: H(e, n),
                    update: function() {
                        i(c, n), u(f, e, n), o(c, e, n)
                    }
                }
            }
        }, {
            match: function(e) {
                return e.is("select") && !C(e) ? !0 : !1
            },
            apply: function(e, n) {
                var s, l, u, c;
                return n.selectAutoWidth && k(e, function() {
                    c = e.width()
                }), s = d(e, n, {
                    divClass: n.selectClass,
                    spanHtml: (e.find(":selected:first") || e.find("option:first")).html(),
                    spanWrap: "before"
                }), l = s.div, u = s.span, n.selectAutoWidth ? k(e, function() {
                    g(t([u[0], l[0]]), {
                        display: "block"
                    }, function() {
                        var e;
                        e = u.outerWidth() - u.width(), l.width(c + e), u.width(c)
                    })
                }) : l.addClass("fixedWidth"), r(e, l, n), a(e, n, {
                    change: function() {
                        u.html(e.find(":selected").html()), l.removeClass(n.activeClass)
                    },
                    "click touchend": function() {
                        var t = e.find(":selected").html();
                        u.html() !== t && e.trigger("change")
                    },
                    keyup: function() {
                        u.html(e.find(":selected").html())
                    }
                }), y(u, n), {
                    remove: function() {
                        return u.remove(), e.unwrap().unbind(n.eventNamespace), e
                    },
                    update: function() {
                        n.selectAutoWidth ? (t.uniform.restore(e), e.uniform(n)) : (i(l, n), u.html(e.find(":selected").html()), o(l, e, n))
                    }
                }
            }
        }, {
            match: function(e) {
                return e.is("select") && C(e) ? !0 : !1
            },
            apply: function(e, t) {
                var n;
                return e.addClass(t.selectMultiClass), n = f(e, t), r(e, e, t), {
                    remove: function() {
                        e.removeClass(t.selectMultiClass), n && e.unwrap()
                    },
                    update: b
                }
            }
        }, {
            match: function(e) {
                return e.is("textarea")
            },
            apply: function(e, t) {
                var n;
                return e.addClass(t.textareaClass), n = f(e, t), r(e, e, t), {
                    remove: function() {
                        e.removeClass(t.textareaClass), n && e.unwrap()
                    },
                    update: b
                }
            }
        }];
    v() && !h() && (x = !1), t.uniform = {
        defaults: {
            activeClass: "active",
            autoHide: !0,
            buttonClass: "button",
            checkboxClass: "checker",
            checkedClass: "checked",
            disabledClass: "disabled",
            eventNamespace: ".uniform",
            fileButtonClass: "action",
            fileButtonHtml: "Choose File",
            fileClass: "uploader",
            fileDefaultHtml: "No file selected",
            filenameClass: "filename",
            focusClass: "focus",
            hoverClass: "hover",
            idPrefix: "uniform",
            inputAddTypeAsClass: !0,
            inputClass: "uniform-input",
            radioClass: "radio",
            resetDefaultHtml: "Reset",
            resetSelector: !1,
            selectAutoWidth: !0,
            selectClass: "selector",
            selectMultiClass: "uniform-multiselect",
            submitDefaultHtml: "Submit",
            textareaClass: "uniform",
            useID: !0,
            wrapperClass: null
        },
        elements: []
    }, t.fn.uniform = function(n) {
        var s = this;
        return n = t.extend({}, t.uniform.defaults, n), A || (A = !0, p() && (x = !1)), x ? (n.resetSelector && t(n.resetSelector).mouseup(function() {
            e.setTimeout(function() {
                t.uniform.update(s)
            }, 10)
        }), this.each(function() {
            var e, s, a, r = t(this);
            if (r.data("uniformed")) return t.uniform.update(r), void 0;
            for (e = 0; e < W.length; e += 1)
                if (s = W[e], s.match(r, n)) return a = s.apply(r, n), r.data("uniformed", a), t.uniform.elements.push(r.get(0)), void 0
        })) : this
    }, t.uniform.restore = t.fn.uniform.restore = function(e) {
        e === n && (e = t.uniform.elements), t(e).each(function() {
            var e, n, s = t(this);
            n = s.data("uniformed"), n && (n.remove(), e = t.inArray(this, t.uniform.elements), e >= 0 && t.uniform.elements.splice(e, 1), s.removeData("uniformed"))
        })
    }, t.uniform.update = t.fn.uniform.update = function(e) {
        e === n && (e = t.uniform.elements), t(e).each(function() {
            var e, n = t(this);
            e = n.data("uniformed"), e && e.update(n, e.options)
        })
    }
}(this, jQuery);