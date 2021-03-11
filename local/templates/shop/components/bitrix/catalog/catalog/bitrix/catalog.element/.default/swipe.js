/**
 * ������� ����������� ������� swipe �� ��������.
 * @param {Object} el - ������� DOM.
 * @param {Object} settings - ������ � ���������������� �����������.
 */
var swipe = function(el, settings) {

    // ��������� �� ���������
    var settings = Object.assign({}, {
        minDist: 60,  // ����������� ���������, ������� ������ ������ ���������, ����� ���� �������� ��� ����� (px)
        maxDist: 120, // ������������ ���������, �� �������� ������� ����� ������ ���������, ����� ���� �������� ��� ����� (px)
        maxTime: 700, // ������������ �����, �� ������� ������ ���� �������� ����� (ms)
        minTime: 50   // ����������� �����, �� ������� ������ ���� �������� ����� (ms)
    }, settings);

    // ��������� ������� ��� ��������� ���������
    if (settings.maxTime < settings.minTime) settings.maxTime = settings.minTime + 500;
    if (settings.maxTime < 100 || settings.minTime < 50) {
        settings.maxTime = 700;
        settings.minTime = 50;
    }

    var dir,                // ����������� ������ (horizontal, vertical)
        swipeType,            // ��� ������ (up, down, left, right)
        dist,                 // ���������, ���������� ����������
        isMouse = false,      // ��������� ���� (�� ������������ ��� ���-�������)
        isMouseDown = false,  // �������� �� �������� ������� ���� (�� ������������ ��� ���-�������)
        startX = 0,           // ������ ��������� �� ��� X (pageX)
        distX = 0,            // ���������, ���������� ���������� �� ��� X
        startY = 0,           // ������ ��������� �� ��� Y (pageY)
        distY = 0,            // ���������, ���������� ���������� �� ��� Y
        startTime = 0,        // ����� ������ �������
        support = {           // �������������� ��������� ���� �������
            pointer: !!("PointerEvent" in window || ("msPointerEnabled" in window.navigator)),
            touch: !!(typeof window.orientation !== "undefined" || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || "ontouchstart" in window || navigator.msMaxTouchPoints || "maxTouchPoints" in window.navigator > 1 || "msMaxTouchPoints" in window.navigator > 1)
        };

    /**
     * ���������� ��������� � �������� �������: pointer, touch � mouse.
     * @returns {Object} - ���������� ������ � ���������� ���������.
     */
    var getSupportedEvents = function() {
        switch (true) {
            case support.pointer:
                events = {
                    type:   "pointer",
                    start:  "PointerDown",
                    move:   "PointerMove",
                    end:    "PointerUp",
                    cancel: "PointerCancel",
                    leave:  "PointerLeave"
                };
                // ���������� ��������� ��� IE10
                var ie10 = (window.navigator.msPointerEnabled && Function('/*@cc_on return document.documentMode===10@*/')());
                for (var value in events) {
                    if (value === "type") continue;
                    events[value] = (ie10) ? "MS" + events[value] : events[value].toLowerCase();
                }
                break;
            case support.touch:
                events = {
                    type:   "touch",
                    start:  "touchstart",
                    move:   "touchmove",
                    end:    "touchend",
                    cancel: "touchcancel"
                };
                break;
            default:
                events = {
                    type:  "mouse",
                    start: "mousedown",
                    move:  "mousemove",
                    end:   "mouseup",
                    leave: "mouseleave"
                };
                break;
        }
        return events;
    };


    /**
     * ����������� ������� mouse/pointer � touch.
     * @param e {Event} - ��������� � �������� ��������� �������.
     * @returns {TouchList|Event} - ���������� ���� TouchList, ���� ��������� ������� ��� ���������.
     */
    var eventsUnify = function(e) {
        return e.changedTouches ? e.changedTouches[0] : e;
    };


    /**
     * ��������� ������ ������� ����������.
     * @param e {Event} - �������� �������.
     */
    var checkStart = function(e) {
        var event = eventsUnify(e);
        if (support.touch && typeof e.touches !== "undefined" && e.touches.length !== 1) return; // ������������� ������� ����������� ��������
        dir = "none";
        swipeType = "none";
        dist = 0;
        startX = event.pageX;
        startY = event.pageY;
        startTime = new Date().getTime();
        if (isMouse) isMouseDown = true; // ��������� ����
    };

    /**
     * ���������� �������� ���������.
     * @param e {Event} - �������� �������.
     */
    var checkMove = function(e) {
        if (isMouse && !isMouseDown) return; // ����� �� �������, ���� ���� ��������� ���� ������� �� ����� ��������
        var event = eventsUnify(e);
        distX = event.pageX - startX;
        distY = event.pageY - startY;
        if (Math.abs(distX) > Math.abs(distY)) dir = (distX < 0) ? "left" : "right";
        else dir = (distY < 0) ? "up" : "down";
    };

    /**
     * ���������� ��������� ������� ����������.
     * @param e {Event} - �������� �������.
     */
    var checkEnd = function(e) {
        if (isMouse && !isMouseDown) { // ����� �� ������� � ����� �������� ������� ����
            isMouseDown = false;
            return;
        }
        var endTime = new Date().getTime();
        var time = endTime - startTime;
        if (time >= settings.minTime && time <= settings.maxTime) { // �������� ������� �����
            if (Math.abs(distX) >= settings.minDist && Math.abs(distY) <= settings.maxDist) {
                swipeType = dir; // ���������� ���� ������ ��� "left" ��� "right"
            } else if (Math.abs(distY) >= settings.minDist && Math.abs(distX) <= settings.maxDist) {
                swipeType = dir; // ���������� ���� ������ ��� "top" ��� "down"
            }
        }
        dist = (dir === "left" || dir === "right") ? Math.abs(distX) : Math.abs(distY); // ���������� ���������� ���������� ���������

        // ��������� ���������� ������� swipe
        if (swipeType !== "none" && dist >= settings.minDist) {
            var swipeEvent = new CustomEvent("swipe", {
                bubbles: true,
                cancelable: true,
                detail: {
                    full: e, // ������ ������� Event
                    dir:  swipeType, // ����������� ������
                    dist: dist, // ��������� ������
                    time: time // �����, ����������� �� �����
                }
            });
            el.dispatchEvent(swipeEvent);
        }
    };

    // ���������� �������������� �������
    var events = getSupportedEvents();

    // �������� ������� ����
    if ((support.pointer && !support.touch) || events.type === "mouse") isMouse = true;

    // ���������� ������������ �� �������
    el.addEventListener(events.start, checkStart);
    el.addEventListener(events.move, checkMove);
    el.addEventListener(events.end, checkEnd);
    if(support.pointer && support.touch) {
        el.addEventListener('lostpointercapture', checkEnd);
    }
};



/**
* ���������� ��������� � �������� �������: pointer, touch � mouse.
* @returns {object} - ���������� ������ � ���������� �������.
*/
var getSupportedEvents = function() {
  var events, support = {
    pointer: !!("PointerEvent" in window || (window.MSPointerEvent && window.navigator.msPointerEnabled)),
    touch: !!(typeof window.orientation !== "undefined" || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || "ontouchstart" in window || navigator.msMaxTouchPoints || 'maxTouchPoints' in window.navigator > 1 || 'msMaxTouchPoints' in window.navigator > 1)
  };
  switch (true) {
    case support.pointer:
      events = {
        type:   "pointer",
        start:  "PointerDown",
        move:   "PointerMove",
        end:    "PointerUp",
        cancel: "PointerCancel",
        leave:  "PointerLeave"
      };
      // ���������� ��������� ��� IE10
      var ie10 = (window.navigator.msPointerEnabled && Function('/*@cc_on return document.documentMode===10@*/')());
      for (var value in events) {
        if (value === "type") continue;
        events[value] = (ie10) ? "MS" + events[value] : events[value].toLowerCase();
      }
      break;
    case support.touch:
      events = {
        type:   "touch",
        start:  "touchstart",
        move:   "touchmove",
        end:    "touchend",
        cancel: "touchcancel"
      };
      break;
    default:
      events = {
        type:  "mouse",
        start: "mousedown",
        move:  "mousemove",
        end:   "mouseup",
        leave: "mouseleave"
      };
      break;
  }
  return events;
};

/**
* ����������� ������� mouse/pointer � touch.
* @param e {object} - ��������� � �������� ��������� �������.
* @returns {TouchList|e} ���������� ���� TouchList, ���� ��������� ������� ��� ���������.
*/
var eventsUnify = function(e) {
  return e.changedTouches ? e.changedTouches[0] : e;
};