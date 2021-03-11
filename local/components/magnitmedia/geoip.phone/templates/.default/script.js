;
if (!window.jQuery && !window.BXmakerJQueryCheck) {
    window.BXmakerJQueryCheck = true;
    document.write('<' + 'script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></' + 'script>');
}


if (window.frameCacheVars !== undefined) {
    BX.addCustomEvent("onFrameDataReceived", function (json) {
        BXmakerGeoIPMessageManager.init();
    });
} else {
    BX.ready(function () {
        BXmakerGeoIPMessageManager.init();
    });
}


if (!!window.BXmakerGeoIPMessageConstructor === false) {

    var BXmakerGeoIPMessageConstructor = function (box) {
        var that = this;
        that.params = {};
        that.box = box;
        that.box.addClass('js-bxmaker__geoip__message--init');
        that.value = that.box.find('.js-bxmaker__geoip__message-value');

        that.params.template = that.box.attr('data-template');
        that.params.key = that.box.attr('data-key');
        that.params.type = that.box.attr('data-type') || 'UNKNOWN';
        that.params.debug = (that.box.attr('data-debug') == 'Y');
        that.params.bSubdomainOn  = (that.box.attr('data-subdomain-on') == 'Y');
        that.params.baseDomain  = (that.box.attr('data-base-domain') || location.hostname );
        that.params.cookiePrefix  = (that.box.attr('data-cookie-prefix') || 'bxmaker.geoip_' );
        that.params.baseDomainCurrent  = null;
        that.params.city = (that.value.attr('data-city') || '');
        that.params.location = (that.value.attr('data-location') || '');


        if (!window.BXmakerDebugGeoIP && ((location.hash == '#BXmakerDebugGeoIP') || that.params.debug)) {
            window.BXmakerDebugGeoIP = true;
            that.log('debug is on');
        }

        that.initEvent();
    };


    BXmakerGeoIPMessageConstructor.prototype.log = function () {
        var that = this;
        if (window.BXmakerDebugGeoIP) {
            var args = Array.prototype.slice.call(arguments);
            args.unshift('bxmaker:geoip.message: [' + that.params.key + '] type:' + that.params.type );
            console.log.apply(console, args);
        }
    };
    BXmakerGeoIPMessageConstructor.prototype.logError = function () {
        var that = this;
        if (window.BXmakerDebugGeoIP) {
            var args = Array.prototype.slice.call(arguments);
            args.unshift('bxmaker:geoip.message: [' + that.params.key + '] type:' + that.params.type );
            console.error.apply(console, args);
        }
    };

    BXmakerGeoIPMessageConstructor.prototype.getBaseDomain = function () {
        var that = this;
        if (that.params.baseDomainCurrent == null) {
            var currentHost = location.hostname.toLowerCase();
            var arBaseDomain = that.params.baseDomain.toLowerCase().split(',');
            that.params.baseDomainCurrent = currentHost;

            for(var i in arBaseDomain)
            {
                if(currentHost.indexOf(arBaseDomain[i]) > -1)
                {
                    that.params.baseDomainCurrent = arBaseDomain[i];
                }
            }
        }
        return that.params.baseDomainCurrent;
    };


    BXmakerGeoIPMessageConstructor.prototype.intval = function (num) {
        if (typeof num == 'number' || typeof num == 'string') {
            num = num.toString();
            var dotLocation = num.indexOf('.');
            if (dotLocation > 0) {//Ампутация дробной части
                num = num.substr(0, dotLocation);
            }
            if (isNaN(Number(num))) {
                num = parseInt(num);
            }
            if (isNaN(num)) {
                return 0;
            }
            return Number(num);
        }
        else if (typeof num == 'object' && num.length != null && num.length > 0) {//Непустой массив/объект -> 1
            return 1;
        }
        else if (typeof num == 'boolean' && num === true) {//true -> 1
            return 1;
        }
        return 0;//Чуть что не так - сразу в ноль
    };


    BXmakerGeoIPMessageConstructor.prototype.cookie = function (name, value, params) {
        var that = this;
        var d = new Date();
        var name = that.params.cookiePrefix + name;
        var params = params || {};
        var parts = [];
        var currentValue, matches;


        if (value === undefined) {
            matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            currentValue = matches ? decodeURIComponent(matches[1].replace(/\+/g, ' ')) : undefined;
            that.log('cookie get: ' + name + ' = ' + currentValue);
            return currentValue;
        }
        else {
            d.setTime(d.getTime() + ((!!params.expires ? params.expires : 365 ) * 24 * 60 * 60 * 1000));
            parts.push(name + "=" + value);// todo  parts.push(name + "=" + encodeURIComponent(value));
            parts.push("expires=" + d.toUTCString());
            parts.push("path=" + (!!params.path ? params.path : '/' ));
            // !!params.domain && parts.push("domain=" + params.domain);
            parts.push("domain=" + that.getBaseDomain());
            document.cookie = parts.join('; ');
            that.log('cookie: ' + parts.join('; '));
        }
    };


    BXmakerGeoIPMessageConstructor.prototype.getJsonFromUrl = function (hashBased) {
        var query;
        if (hashBased) {
            var pos = location.href.indexOf("?");
            if (pos == -1) return [];
            query = location.href.substr(pos + 1);
        } else {
            query = location.search.substr(1);
        }
        var result = {};
        query.split("&").forEach(function (part) {
            if (!part) return;
            part = part.split("+").join(" "); // replace every + with space, regexp-free version
            var eq = part.indexOf("=");
            var key = eq > -1 ? part.substr(0, eq) : part;
            var val = eq > -1 ? decodeURIComponent(part.substr(eq + 1)) : "";
            var from = key.indexOf("[");
            if (from == -1) result[decodeURIComponent(key)] = val;
            else {
                var to = key.indexOf("]", from);
                var index = decodeURIComponent(key.substring(from + 1, to));
                key = decodeURIComponent(key.substring(0, from));
                if (!result[key]) result[key] = [];
                if (!index) result[key].push(val);
                else result[key][index] = val;
            }
        });
        return result;
    };


    BXmakerGeoIPMessageConstructor.prototype.initEvent = function () {
        var that = this;

        that.log('init event');

        // $(document).on('bxmaker.geoip.city.change', function (event, data) {
        //     that.log('event: bxmaker.geoip.city.change', data);
        //
        //     that.params.location = data.location;
        //     that.params.city = data.city;
        //
        //     that.reload();
        // });

        $(document).on('bxmaker.geoip.city.show', function(event, data){
            that.log('event: bxmaker.geoip.city.show', data);

            if(that.params.location != data.location || that.params.city != data.city)
            {
                that.params.location = data.location;
                that.params.city = data.city;
                that.reload();
            }
            else
            {
                that.box.removeClass('preloader');
            }
        });

        if(!!window.BXmakerGeoIPCity)
        {
            if(that.params.location != window.BXmakerGeoIPCity.getLocation() || that.params.city != window.BXmakerGeoIPCity.getCity())
            {
                that.params.location = window.BXmakerGeoIPCity.getLocation();
                that.params.city = window.BXmakerGeoIPCity.getCity();
                that.reload();
            }
            else
            {
                that.box.removeClass('preloader');
            }
        }

    };

    BXmakerGeoIPMessageConstructor.prototype.getType = function () {
        var that = this;
        return that.params.type;
    };
    BXmakerGeoIPMessageConstructor.prototype.getKey = function () {
        var that = this;
        return that.params.key;
    };

    BXmakerGeoIPMessageConstructor.prototype.reload = function () {
        var that = this;

        that.log('trigger:bxmaker.geoip.message.reload.before');
        $(document).trigger('bxmaker.geoip.message.reload.before');

        that.box.addClass('preloader');

        $.ajax({
            type: 'POST',
            url: '/',
            dataType: 'json',
            data: {
                sessid: BX.bitrix_sessid(),
                module: 'bxmaker.geoip',
                method: 'getMessage',
                type: that.params.type,
                template: that.params.template
            },
            error: function (r) {

                that.log(r, true);

                that.box.removeClass('preloader');

                var error = {
                    'error': {
                        code: 'ajax_error',
                        msg: 'Error  connection to server',
                        more: r
                    }
                };

                that.log('trigger:bxmaker.geoip.message.reload.after', error);
                $(document).trigger('bxmaker.geoip.message.reload.after', error);
            },
            success: function (r) {
                if (!!r.response) {
                    that.log(' getMessage: success');
                    that.box.html(r.response.html);

                    that.value = that.box.find('.js-bxmaker__geoip__message-value');
                    that.params.city = (that.value.attr('data-city') || '');
                    that.params.location = (that.value.attr('data-location') || 0);

                }
                else if (!!r.error) {
                   that.logError(' getMessage: error', r);
                }

                that.box.removeClass('preloader');

                that.log('trigger:bxmaker.geoip.message.reload.after', r);
                $(document).trigger('bxmaker.geoip.message.reload.after', r);
            }
        })

    };

}


if (!!window.BXmakerGeoIPMessageManager === false) {
    (function () {

        var BXmakerGeoIPMessage = function () {
            var that = this;
            that.items = {};
            that.itemsKey = {};
        };

        BXmakerGeoIPMessage.prototype.init = function () {
            var that = this;

            $('.js-bxmaker__geoip__message:not(.js-bxmaker__geoip__message--init)').each(function () {
                var item = new BXmakerGeoIPMessageConstructor($(this));

                that.items[item.getType()] = item;
                that.itemsKey[item.getKey()] = item;
            });
        };

        BXmakerGeoIPMessage.prototype.getItems = function (type) {
            var that = this;
            return that.items[type] || {};
        };

        BXmakerGeoIPMessage.prototype.getItemByKey = function (code) {
            var that = this;
            return that.itemsKey[code] || false;
        };

        window.BXmakerGeoIPMessageManager = new BXmakerGeoIPMessage();
    })();

}
