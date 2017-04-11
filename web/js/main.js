/**
 * Created by isak on 11/04/17.
 */

$(function() {

    timerInvasion.init();

    timerInvasion.updateText();

    setInterval(function() { timerInvasion.updateText(); }, 1000);
});

var timerInvasion = {

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
        var currentTime = parseInt((new Date()).getTime() / 1000);

        var progress = ((currentTime - this.timestampDefault) % this.timeInterval);

        var textToUse = '';
        var duration;
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