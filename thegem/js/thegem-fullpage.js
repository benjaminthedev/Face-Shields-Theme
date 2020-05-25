(function($) {

    if (typeof window.CustomEvent !== "function") {
        function CustomEvent( event, params ) {
            params = params || { bubbles: false, cancelable: false, detail: undefined };
            var evt = document.createEvent( 'CustomEvent' );
            evt.initCustomEvent( event, params.bubbles, params.cancelable, params.detail );
            return evt;
        }
        CustomEvent.prototype = window.Event.prototype;
        window.CustomEvent = CustomEvent;
    }

    function initTheGemFullpage() {
        window.gemSettings.fullpageEnabled = true;

        let fullpageId = '#thegem-fullpage',
            sectionSelector = '.scroller-block',
            anchorAttrName = 'data-anchor',
            $body = $('body'),
            $fullpage = $(fullpageId),
            isDisabledDots = $body.hasClass('thegem-fp-disabled-dots'),
            isDisabledTooltips = $body.hasClass('thegem-fp-disabled-tooltips'),
            isEnableAnchor = $(sectionSelector+'['+anchorAttrName+']').length !== 0,
            isFixedBackground = $body.hasClass('thegem-fp-fixed-background'),
            isDisabledMobile = $body.hasClass('thegem-fp-disabled-mobile'),
            isEnableContinuous = $body.hasClass('thegem-fp-enable-continuous'),
            menuSelector = '#primary-menu',
            anchors = [];

        let options = {
            sectionSelector: sectionSelector,
            verticalCentered: false,
            navigation: !isDisabledDots,
            autoScrolling: true,
            navigationTooltips: isDisabledTooltips ? [''] : [],
            anchors: anchors,
            lockAnchors: !isEnableAnchor,
            css3: !isFixedBackground,
            responsiveWidth: isDisabledMobile ? 768 : 0,
            continuousVertical: isEnableContinuous,
            licenseKey: ''
        };

        if (isEnableAnchor) {
            options.menu = menuSelector;

            let anchorItems = [];
            $fullpage.find(sectionSelector).each(function(idx, item) {
                let anchor = $(item).attr(anchorAttrName);
                if (anchor===undefined || anchor===$(item).attr('id')) {
                    $(item).attr(anchorAttrName, 'section-'+(idx+1));
                }
                anchorItems.push($(item).attr(anchorAttrName));
            });

            $('li', menuSelector).each(function(idx, item) {
                let link = $('a', item);
                if (link.length) {
                    let anchor = link.attr('href').replace('#','');
                    if (anchorItems.indexOf(anchor)!==-1) {
                        $(item).attr('data-menuanchor', anchor);
                    }
                }
            });
        }

        options.onLeave = function(origin, destination, direction){
            if (isEnableAnchor) {
                activateMenuElement(menuSelector, destination);
            }
            sendCustomEvent();
        };

        options.afterLoad = function(origin, destination, direction){
            if (isEnableAnchor) {
                activateMenuElement(menuSelector, destination);
                sendCustomEvent();
            }

            $('.wpb_animate_when_almost_visible:not(.wpb_start_animation)', destination.item).each(function(index, item) {
                $(item).addClass('wpb_start_animation animated');
            });

            $('.lazy-loading:not(.lazy-loading-end-animation)', destination.item).each(function(index, item) {
                setTimeout(function() {
                    item.classList.add('lazy-loading-start-animation');
                    setTimeout(function () {
                        item.className = item.className.replace('lazy-loading-before-start-animation', '');
                        item.className = item.className.replace('lazy-loading-start-animation', 'lazy-loading-end-animation');
                    }, 200);
                }, 200 * (index+1));
            });

            if ($('.gem-counter-box', destination.item) !== 0 && $('.gem-counter-box', destination.item).hasClass('lazy-loading')) {
                $('.gem-counter', destination.item).each(function(index, item) {
                    window.thegem_init_odometer(item);
                });
            }
        };

        options.afterResponsive = function (isResponsive) {
            window.gemSettings.fullpageEnabled = isResponsive && !isDisabledMobile;
        };

        new fullpage(fullpageId, options);
    }

    function sendCustomEvent() {
        document.dispatchEvent(new window.CustomEvent('fullpage-updated'));
    }
    
    function activateMenuElement(menuSelector, destination){
        $('li', menuSelector).removeClass('menu-item-active');
        $(menuSelector).find('[data-menuanchor="'+destination.anchor+'"]', 'li').addClass('menu-item-active');
    }

    initTheGemFullpage();

})(window.jQuery);