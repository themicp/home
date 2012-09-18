var theme = 'default';

var outputdiv = "#rssfeeds";

$(document).ready(
	function () {
		$("#rssfeeds").html( '<center><img alt="loading" src="styles/'+theme+'/images/actions/loading.gif" /></center>' );

		$.post( "xml/getfeeds.php",
			function () {
				printfeeds();
			}
		);
		
		$("#refresh").click(
			refreshfeeds
		);
		
		$("#changesource").click(
			function () {
				$("#changefeedsource").toggle(500);
			}
		);
	}
);

function parseXml( xml )
{
	var num = 0;
	var feedsStr = "";
	
	/* Apply header */
	feedsStr += '<h3>' + $(  $(xml).find("title")[0]  ).text() + '</h3>';
	/* List started */
	feedsStr += '<ol class="rssl">';
	
	/* Fixing some tags */
	$(xml).find("entry").each(
		function () {
			$(this).replaceWith( "<item>" + $(this).text() + "</item>" );
		}
	)
	
	$(xml).find("item").each(
		function() {
			num++;
			
			var feedLink = $(this).find("link").first().text();
			var feedTitle = $(this).find("title").first().text();
			var sp = "odd";
			var addClass = "";
			
			if (num % 2 == 0)
				sp = "even";
			
			if ( num > 5 )
				/* We make the extra feeds hidden by adding the clas more */
				addClass = "more";
			
			feedsStr +=
				"<li class=\"" + addClass + " " + sp+ "\">"
					+'<span class="feedCount">'+
						num
					+'</span>'
					+'<a href="' + feedLink + '">' +
						feedTitle
					+ '</a>'
					+'<div class="rssfeedDescr">'
						+ $(this).find('description').text().replace(/<\/?[^>]+>/gi, '')
					+'</div>'
				+ "</li>";
			return;
		});
	/* POSTFIX */
	feedsStr += '</ol> <div class="morefeeds">More entries (+)</div> <div class="lessfeeds">Less entries (-)</div>';
	
	/* APPLY CHANGES */
	$( outputdiv ).html( feedsStr );
	
	/* Show More Feeds */
	$("div.morefeeds").click(
		function () {
			/* Show the 5 first elements that are hidden */
			for (var k=0; k<5; k++)
				$(".more:first").toggleClass('more');
		}
	);
	
	/* Show Less Feeds */
	$("div.lessfeeds").click(
		function () {
			/* Prevent from hiding all items */
			if ( $("ol.rssl li:nth-child(6)").hasClass("more") )
				return;
			/* Hide the last 5 items that they are visible class */
			for (var k=0; k<5; k++)
				$('.rssl li').not('.more').last().toggleClass('more');
		}
	);

	return;
}

/* Prints the data of our feeds with a new request */
function printfeeds() {
	$.ajax({
		type: "GET",
		url: "./xml/feed.xml",
		dataType: "xml",
		success: parseXml
	});
}
/* It changes the source of the feeds */
function changefeed () {
	$("#rssfeeds").html( '<center><img alt="loading" src="styles/'+theme+'/images/actions/loading.gif" /></center>' );
	var goal = "xml/getfeeds.php";
	var url = $("textarea").attr("value");
	$.post(goal, {'s' : url } , function () {printfeeds();} );
}

function refreshfeeds() {
		$("#rssfeeds").html( '<img alt="loading" src="styles/'+theme+'images/actions/loading.gif" />' );

		$.post( "xml/getfeeds.php",
			function () {
				printfeeds();
			}
		);
	}