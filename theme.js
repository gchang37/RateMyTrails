$(function(){

	//Hiding video playing text
	$("#wp-a11y-speak-polite").addClass("visually-hidden");

	//Making the navigation menu accessible
	$(".menu-main-menu-container").wrap("<nav aria-labbeled by='Main Menu'></nav>");

	//Sticky Header
	$(window).on("scroll", function(){
		if($(window).scrollTop()>400){
			$("header").addClass("sticky");
			$(".wrapper").addClass("drop");
		}else{
			$("header").removeClass("sticky");
			$(".wrapper").removeClass("drop");
		}
	});

	//Displaying posts
	$("#showMorebtn").on("click", function(){
		$(this).attr('aria-pressed', 'true');
		$("#showLessbtn").attr('aria-pressed','false');
		//$("article").attr('aria-pressed', 'true');
		$("article").fadeIn(function(){
			$(this).css('display', 'flex');
		});
	});

	//Hiding posts
	$("#showLessbtn").on("click", function(){
		$(this).attr('aria-pressed','true');
		$("#showMorebtn").attr('aria-pressed','false');
		//$("article").attr('aria-pressed','false');
		$("article").fadeOut();
	});

	//Coments -- throws my broswer into an endless loop! Beware!
	//$(".comment-text").after("<div class='comment-ratings'></div>");
	//$(".comment-text").siblings().appendTo(".comment-ratings");

	//These effect will be applied when window size is greater than 600px
	if($(document).width() >600){

		//Grouping plugins together
		$(".wrapperSingle").after("<div class='sideBar'></div>");
		$(".wrapperSingle").siblings().appendTo(".sideBar");
		
		//Removing grouping for home page
		//$(".blog").removeClass("sideBar");


		//Adding the drop down button for sub-menu
		$("#menu-item-151").after("<button id='showMorebtn' aria-labelledby='show sub-menu button' aria-pressed='false'></button>");

		//Making a drop down sub menu
		$("#menu-item-151").attr("aria-haspopup", "true");

		//Mouse / key events for sub-menu
		$('[aria-pressed = "false"]')
			.on("click", function(event){

				var subMenu = $(this).prev().find(".sub-menu");
			
				subMenu.toggleClass('expanded');
				
				if(subMenu.hasClass('expanded')){
					$(this).attr('aria-expanded', 'true');
				}else{	
					$(this).removeAttr('aria-expanded');
				}
			})
			.on("keydown", function(event){
				event.preventDefault();

				if(event.which== 40 || event.which == 32 || event.which ==13){
					event.preventDefault();
					var subMenu =  $(this).prev().find(".sub-menu");
					subMenu.addClass('expanded');

					if(subMenu.hasClass('expanded')){
						$(this).attr('aria-expanded', 'true');
					}else{
						$(this).removeAttr('aria-expanded');
					}
					subMenu.children().first().focus();
				}
			});

		//Sub-menu item
		$(".menu-item-type-post_type").on("keydown", function(event){
			event.preventDefault();

			//right key
			if(event.which == 39){
				var nextItem = $(this).parent().next().find('a');
				if(nextItem.length > 0){
					nextItem.focus();
				}else{
					$(this).parent.siblings.first.find('a').focus();
				}
			}

			//left key
			if(event.which == 37 ){
				var prevItem = $(this).parent().prev().find('a');

				if(prevItem.length >0){
					prevItem.focus();
				} else{
					$(this).parent().siblings().last().find('a').focus();
				}
			}

			//tab or esc key
			if(event.which == 9 || event.which == 27){
				var menu = $(this).closest('ul');
				menu.removeClass('expanded');
				menu.prev.removeAttr('aria-expanded');
			}
		});		
	}


	
	// $("article").find(".comment-text").siblings().wrapAll("<div class='comment-ratings'></div> ");

});
