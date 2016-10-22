/* ================================= */
/* ::::::::: 1. Countdown :::::::::: */
/* ================================= */
var date = $('#date').html();
date = date.split('/');
$('#countdown_dashboard').countDown({
    targetDate: {
        'day': date[1],
        'month': date[0],
        'year': date[2],
        'hour': 11,
        'min': 0,
        'sec': 0
    },
    omitWeeks: true
});