'use strict';

var GS = window['GS'] || {};

if(!GS.Share) {

    var getUri = function(valueEncoded) {
        var href = window.location.href;
        if (valueEncoded) {
            return encodeURIComponent(href);
        }
        return href;
    };

    var getTitle = function() {
        return document.title;
    };

    var encodeUri = function(str) {
        return encodeURIComponent(str);
    };

// todo: revise if all methods can be used in IE
    var  queryCreator = function(map, encode) {
        if (encode === undefined) {
            encode = true;
        }

        var separator = "&";
        var equal = "=";
        var uri = "";

        for (var item in map) {
            if (map.hasOwnProperty(item) && (item)) {
                if (uri.length > 0) {
                    uri += separator
                }
                var value;

                if (encode) {
                    value = encodeURIComponent( map[item]);
                } else {
                    value = map[item];
                }
                uri += "".concat(item).concat(equal).concat(value);
            }
        }
        return uri;
    };

    /* Twitter */
    var Twitter = function() {
        this.name = "Twitter";
        this.baseUrl = "https://twitter.com/share?";
    };

    Twitter.prototype.getUrl = function() {
        var keys = {};
        keys["url"] = getUri(false);
        keys["text"] = getTitle();

        return this.baseUrl + queryCreator(keys, true);
    };

    /* Facebook */
    var Facebook = function() {
        this.name = "Facebook";
        this.baseUrl = "https://www.facebook.com/sharer/sharer.php?";
    };

    Facebook.prototype.getUrl = function() {
        var keys = {};
        keys["u"] = getUri(false);
        return this.baseUrl + queryCreator(keys);
    };

    /* LinkedIn */
    var LinkedIn = function() {
        this.name = "LinkedIn";
        this.baseUrl = "https://www.linkedin.com/shareArticle?";
    };

    LinkedIn.prototype.getUrl = function() {
        var keys = {};

        keys["mini"] = "true";
        keys["url"] = getUri(false);
        keys["title"] =  encodeUri(getTitle());

        return this.baseUrl + queryCreator(keys);
    };

    var Email = function() {
        this.name = "Email";
        this.baseUrl = "mailto:?";
        this.openUsingCurrentWindow = true;
    };

    Email.prototype.getUrl = function() {
        var keys = {};
        keys["subject"] = getTitle();
        keys["body"] = getUri();

        return this.baseUrl + queryCreator(keys);
    };

    var ShareBar = function() {
        this.socialMediaPlatforms = new Map();
        this.init();
    };

    ShareBar.prototype.init = function() {
        this.createPlatforms();

        var shareBarClass = "social-share-bar";

        var shareBars = document.getElementsByClassName(shareBarClass);

        if (shareBars.length > 0) {
            for (var i = 0; i < shareBars.length; i++) {
                var shareBar = shareBars[i];
                this.overrideShareBar(shareBar);
            }
        }
    };

    ShareBar.prototype.createPlatforms = function() {
        var fb = new Facebook();
        var twitter = new Twitter();
        var linkedIn = new LinkedIn();
        var email = new Email();

        this.socialMediaPlatforms.set(fb.name.toLowerCase(), fb);
        this.socialMediaPlatforms.set(twitter.name.toLowerCase(), twitter);
        this.socialMediaPlatforms.set(linkedIn.name.toLowerCase(), linkedIn);
        this.socialMediaPlatforms.set(email.name.toLowerCase(), email);
    };

    ShareBar.prototype.getPlatformFromElement = function(element) {
        var platform = element.getAttribute("data-platform");
        return platform || null;
    };

    ShareBar.prototype.onClickSocialMediaPlatform = function(platformName, event) {
        event.stopPropagation();
        event.preventDefault();

        if (!platformName) {
            platformName = this.getPlatformFromElement(event.target);
        }

        if (typeof gsAnalytics == 'object'
            && typeof gsAnalytics.handleSocialShare == 'function') {
            gsAnalytics.handleSocialShare(true, platformName);
        }

        var socialPlatform = this.socialMediaPlatforms.get(platformName);

        var params = "scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,\
        width=600,height=400,left=100,top=100";

        if (socialPlatform) {

            if (socialPlatform.openUsingCurrentWindow) {
                location.href = socialPlatform.getUrl();
            } else {
                window.open(socialPlatform.getUrl(), socialPlatform.name, params);
            }
        }
    };

    ShareBar.prototype.overrideShareBar = function(shareBar) {
        var that = this;
        var items = shareBar.getElementsByTagName("a");

        if (items) {
            for (var i = 0; i < items.length; i++) {
                var item = items[i];

                var platformName = this.getPlatformFromElement(item);

                //the close button is a child element, which does not contain data-platform
                //attribute
                if (platformName === null) {
                    continue;
                }

                var socialMediaPlatform = this.socialMediaPlatforms.get(platformName);
                if (socialMediaPlatform) {
                    (function(platformName) {
                        item.addEventListener("click", function(event){
                            that.onClickSocialMediaPlatform(platformName, event);
                        });
                    })(platformName);

                } else {
                    item.style.display = "none";
                }
            }
        }
    };

    /* Does nothing, this is only here to prevent errors */
    ShareBar.prototype.updateShareTitle = function() {
        return null;
    };

    GS.Share = new ShareBar();
    GS.Page.register("*", GS.Share.init.bind(GS.Share));
}