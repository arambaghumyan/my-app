require('./bootstrap');
import $ from 'jquery';
import Cookie from 'js-cookie';
window.$ = window.jQuery = $;


if (typeof Cookie.get('theme') === 'undefined' || Cookie.get('theme') == 'light') {
	setTheme('light');
} else {
	setTheme('dark')
}

$(document).off('click', '.dark-light-btn').on('click', '.dark-light-btn', function(){
	if ($('body').attr('data-theme') == 'dark') {
		setTheme('light')
	} else {
		setTheme('dark');
	}
})

function setTheme(mode) {
	$('body').attr('data-theme', mode);
	Cookie.set('theme', mode)
}