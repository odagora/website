jQuery(document).ready(function () {
    var count1 = (load_more_posts_variable.counts_posts);
    var count2 = (load_more_posts_variable.blog_post_count);
    var $container = jQuery('.masonry1');
    var totalPosts = parseInt(count1);
    var view_post = parseInt(count2);
    var show_after = 1 + parseInt(view_post);
    var j;
    var i;
    var totPost = totalPosts;
    j = i = totalPosts - view_post; //  Show only 3 posts
    for (totalPosts; i >= 1; i--, totalPosts--) {
        jQuery('#row-' + totalPosts).hide();
    }
    if (totPost <= view_post) {
        jQuery('.post-btn1').hide();
    } else if (totPost >= show_after) {
        jQuery('.post-btn1').show();
    }
	function getItemElement(id, co) {
	  var cou = 300*co;
	  var elem = document.createElement('li');
	  elem.className = 'cls-'+id+' filter_item_block rotateInUpLeft animated visible abc';
	  elem.setAttribute('data-animation-delay', cou);
	  elem.setAttribute('data-animation','rotateInUpLeft');
	  jQuery('.filter_item_block').css({top: '', left: '', position: ''});
	  return elem;
	}
    jQuery(".append-button").click(function(){
	var showPosts = view_post;
	var co = 1;
	while(!showPosts==0 && totalPosts < totPost ){
	var plusOne = totalPosts+1;
	var elems = getItemElement(totalPosts+1, co);
	var Html = jQuery('#row-'+plusOne).html();
	jQuery('#row-'+plusOne).remove();
	jQuery(elems).append(Html);
	$container.append( elems );
	co++;
	if(showPosts%3==0){
	jQuery('.cls-'+totalPosts).after('<div class="clearfix"></div>');
	}
	showPosts--;
	totalPosts++;
	}
	if(totPost==totalPosts)
	{
	jQuery('.post-btn1').hide();
	}
});
});