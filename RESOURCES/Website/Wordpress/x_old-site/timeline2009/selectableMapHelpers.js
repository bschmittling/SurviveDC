var tl;
var allEventsSource = new Timeline.DefaultEventSource();
function onLoad() {
	var bandInfos = [
		Timeline.createHotZoneBandInfo({
         zones: [
             {   start:    "Mar 01 2009 20:00:00 GMT-0400",
                 end:      "May 15 2009 22:00:00 GMT-0400",
                 magnify:  1,
                 unit:     Timeline.DateTime.MINUTE,
                 multiple: 10
             },
             {   start:    "May 02 2009 19:00:00 GMT-0400",
                 end:      "May 02 2009 23:30:00 GMT-0400",
                 magnify:  5,
                 unit:     Timeline.DateTime.MINUTE,
                 multiple: 10
             }
         ],
			eventSource:    allEventsSource,
         	date:           "May 02 2009 20:00:00 EDT",
         	timeZone: -4,
   			width:          "70%", 
            intervalUnit:   Timeline.DateTime.HOUR, 
         	intervalPixels: 600
     }),
     Timeline.createHotZoneBandInfo({
         zones: [
             {   start:    "Mar 01 2009 20:00:00 GMT-0400",
                 end:      "May 15 2009 22:00:00 GMT-0400",
                 magnify:  1,
                 unit:     Timeline.DateTime.HOUR
             },
             {   start:    "May 02 2009 19:00:00 GMT-0400",
                 end:      "May 02 2009 23:30:00 GMT-0400",
                 magnify:  5,
                 unit:     Timeline.DateTime.HOUR
             }
         ],
	     overview:       true,
         	timeZone: -4,
			eventSource:    allEventsSource,
         	date:           "May 02 2009 20:00:00 EDT",
         width:          "20%", 
         intervalUnit:   Timeline.DateTime.HOUR, 
         intervalPixels: 150
     }),
     Timeline.createHotZoneBandInfo({
         zones: [
             {   start:    "Mar 01 2009 20:00:00 GMT-0400",
                 end:      "May 15 2009 22:00:00 GMT-0400",
                 magnify:  1,
                 unit:     Timeline.DateTime.DAY
             },
             {   start:    "May 02 2009 19:00:00 GMT-0400",
                 end:      "May 02 2009 23:30:00 GMT-0400",
                 magnify:  5,
                 unit:     Timeline.DateTime.DAY
             }
         ],
	     overview:       true,
         	timeZone: -4,
			eventSource:    allEventsSource,
         	date:           "May 02 2009 20:00:00 EDT",
         width:          "10%", 
         intervalUnit:   Timeline.DateTime.DAY, 
         intervalPixels: 150
     })
   ];
   
   for (var i = 0; i < bandInfos.length; i++) {
   		if (i > 0) {
   			bandInfos[i].syncWith=0;
   		}
        bandInfos[i].decorators = [
            new Timeline.SpanHighlightDecorator({
                startDate:  "May 02 2009 19:00:00 GMT-0400",
                endDate:    "May 02 2009 23:30:00 GMT-0400",
                color:      "#000000",
                opacity:    5
            })
        ];
   }
   tl = Timeline.create(document.getElementById("survivedc_timeline"), bandInfos);
   loadData(true,true,true,true);
 }
 
 function loadData(loadSpecial,loadChaser,loadCheckpoint,loadPlayer) {
	allEventsSource.clear();
 	if (loadSpecial) {
		Timeline.loadXML("dc_journey_2009_special.xml", function(xml, url) { allEventsSource.loadXML(xml, url); })
	}
	if (loadChaser) {
		Timeline.loadXML("dc_journey_2009_chaser.xml", function(xml, url) { allEventsSource.loadXML(xml, url); })
	}
	if (loadCheckpoint) {
		Timeline.loadXML("dc_journey_2009_checkpoint.xml", function(xml, url) { allEventsSource.loadXML(xml, url); })
	}
	if (loadPlayer) {
		Timeline.loadXML("dc_journey_2009_player.xml", function(xml, url) { allEventsSource.loadXML(xml, url); })
	}
 }

 var resizeTimerID = null;
 function onResize() {
     if (resizeTimerID == null) {
         resizeTimerID = window.setTimeout(function() {
             resizeTimerID = null;
             tl.layout();
         }, 500);
     }
 }