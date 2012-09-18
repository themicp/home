function createDropAreas ( event , ui ) {
	$(".elem").after( '<div class="droparea">Drop window here</div>' );
	$("#left").prepend( '<div class="droparea">Drop window here</div>' );
	$("#right").prepend( '<div class="droparea">Drop window here</div>' );
	
	$('.droparea').show(300);
	
	$(".droparea").droppable(
		{
		accept: '.elem',
		hoverClass: 'drophover',
		drop: moveElement,
		tolerance: 'pointer'
		}
	);
}

function deleteDropAreas ( event , ui ) {
	$(".droparea").remove();
}

function moveElement( event , ui ) {
	ui.draggable.draggable( 'option', 'revert', false );
	ui.draggable.insertAfter( $(this) );
}

$(document).ready(
	function () {
		setbodyheight();
		
		/* Draggable elements */
		
		$("#themeOptionsForm").change(
			function() {
				$("label").removeClass("tempSelectTheme");
				$("#themeOptionsForm input:checked").next("label").addClass("tempSelectTheme");
			}
		);
		
		$(".elem").draggable(
			{
			handle: 'h2',
			containment: 'body',
			cursor: 'move',
			snap: '.droparea',
			snapMode: 'inner',
			snapTolerance: 100,
			stack: '.elem',
			revert: true,
			helper: 'clone',
			zIndex: 100,
			start: createDropAreas,
			stop: deleteDropAreas
			}
		);
		
	
		$("#setSize").click(
			function () {
				$(".bookmarks").toggleClass('small');
			}
		);
		
		$("#AddBookmarksGroup").click(
			function () {
				$("#showcase").css( {'display':'block' , 'height' : $('body').height() } );
				$("#addbookmarksgroup").css( {'display':'block'} );
			}
		);
		
		$("#AddBookmark").click(
			function () {
				$("#showcase").css( {'display':'block' , 'height' : $('body').height() } );
				$("#addbookmark").css( {'display':'block'} );
			}
		);
		
		$("#bmadd").click(
			function () {
				$("#showcase").css( {'display':'block' , 'height' : $('body').height() } );
				$("#addbookmark").css( {'display':'block'} );
			}
		);
		
		
		$("#showcase").click(
			function () {
				$("#showcase").css( {'display':'none'} );
				$("#addbookmark").css( {'display':'none'} );
				$("#addbookmarksgroup").css( {'display':'none'} );
				clearform();
			}
		);
		
		$('#soptions img').click(
			function () {
				$(this).prev().prop( "checked" ,true );
			}
		);
	
	}
);


function addnewbm () {
	var newlink = $("#bmlink").attr('value');
	var newtitle = $('#bmtitle').attr('value');
	var favicon = '' + newlink + '/favicon.ico';
	var newli = '<li class="newbm"><div class="bmimg"><a href="' + newlink + '">'
						+ '<img alt="Bookmark title" src="' + favicon + '" />'
							+'</a></div><div class="bmdescr"><a href="' + newlink + '">'
								+ newtitle
									+ '</a></div></li>';
	/* Put it on the list */								
	$(".bookmarks").append( newli );
	/* ...just before the add button, and remove the newlbm class */
	$(".newbm").insertBefore(".bookmarks li:first").removeClass("newbm");
	/* Close the pop up window */
	$("#showcase").css( {'display':'none'} );
	$("#addbookmark").css( {'display':'none'} );
	
	clearform();
}

function clearform () {
	$("#bmlink")[0].value = "";
	$("#bmtitle")[0].value = "";
}

$(window).resize(
	function() { setbodyheight(); }
);

function setbodyheight()  {
	$('body').height( $(window).height() );
	$("#showcase").height( $('body').height() );
	$("#showcase").width( $('body').width() + 50 +'px');
	
	$("#searchterm").width( $("#searchsubmit").width() - 60 );
	$("#searchbutton").css( {"right" : $("#searchsubmit").width() * 0.05 + 6} );
	return;
}