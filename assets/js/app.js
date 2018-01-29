require('../css/app.scss');

require('fullpage.js');

const $ = require('jquery');
const moment = require('moment');


$(function() {
    $('#fullpage').fullpage({
        anchors: ['timing', 'whatIsItEN', 'whatIsItFR'],
        sectionsColor: ['#555', '#3c0600', '#2b0050'],
        scrollBar: true
    });

    timerInvasion.init();

    timerInvasion.updateText();

    setInterval(function() { timerInvasion.updateText(); }, 1000);
});

const timerInvasion = {

    textInvasionIsOn: '',
    textNextInvasion: '',
    timestampDefault: 0,
    timeInterval: 0,
    durationInvasion: 0,

    init: function() {
        this.textInvasionIsOn = $('[name="textInvasionIsOn"]').val();
        this.textNextInvasion = $('[name="textNextInvasion"]').val();
        this.timestampDefault = parseInt($('[name="timestampDefault"]').val());
        this.timeInterval = parseInt($('[name="timeInterval"]').val());
        this.durationInvasion = parseInt($('[name="durationInvasion"]').val());
        this.divMessage = $('#message');
    },

    updateText: function() {
        let currentTime = Math.floor((new Date()).getTime() / 1000);

        let progress = ((currentTime - this.timestampDefault) % this.timeInterval);

        let textToUse = '';
        let duration;
        if(progress < this.durationInvasion) {
            duration = moment.duration(this.durationInvasion - progress, 'seconds');
            textToUse = this.textInvasionIsOn;
        } else {
            duration = moment.duration(this.timeInterval - progress, 'seconds');
            textToUse = this.textNextInvasion;
        }

        textToUse = textToUse.replace('%hours%', duration.hours()).replace('%minutes%', duration.minutes()).replace('%seconds%', duration.seconds());

        this.divMessage.text(textToUse);
    }
};