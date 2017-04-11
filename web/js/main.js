/**
 * Created by isak on 11/04/17.
 */

$(function() {
    var textInvasionIsOn = $('[name="textInvasionIsOn"]').val();
    var textNextInvasion = $('[name="textNextInvasion"]').val();
    var timestampDefault = parseInt($('[name="timestampDefault"]').val());
    var timeInterval = parseInt($('[name="timeInterval"]').val());

    var currentTime = (new Date()).getTime();

    var progress = ((currentTime - timestampDefault) % timeInterval);

    console.log(currentTime, timestampDefault, timeInterval);

    console.log(progress);
});