$(document).ready( function () {
	if ($('select[name="town_list"]').length) {
	selectList = document.forms["arrFilter_form"].elements["town_list"];
	$(selectList).val($('input[name="arrFilter_pf[town]"]').val()); 
	if (selectList.selectedIndex==-1)
		$(".news-list").css("display", "none");
	else 
		$(".news-list").css("display", "block");
		
	$('select[name="town_list"]').change( function () {
		selectList = document.forms["arrFilter_form"].elements["town_list"];
		selectedIndex = selectList.selectedIndex;
		$('input[name="arrFilter_pf[town]"]').val($("select[name='town_list'] option:selected").text());
		$('input[name="set_filter"]').click();
	});}
})