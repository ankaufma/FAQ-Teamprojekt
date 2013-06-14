   $(function() {
      $.fn.raty.defaults.path = '../client/img';

      $('#star').raty();

      $('#score-demo').raty({ score: 3 });

      $('#number-demo').raty({ number: 10 });

      $('#numberMax-demo').raty({
        numberMax: 5,
        number   : 500
      });

      $('#number-callback-demo').raty({
        number: function() {
          return $(this).attr('data-number');
        }
      });

      $('#scoreName-demo').raty({ scoreName: 'entity[score]' });

      $('#readOnly-demo').raty({ readOnly: true, score: 3 });

      $('#readOnly-callback-demo').raty({
        readOnly: function() {
          return 'true becomes readOnly' == 'true becomes readOnly';
        }
      });

      $('#noRatedMsg-demo').raty({
        readOnly  : true,
        noRatedMsg: "I'am readOnly and I haven't rated yet!"
      });

      $('#score-callback-demo').raty({
        score: function() {
          return $(this).attr('data-score');
        }
      });

      $('#halfShow-true-demo').raty({ score: 3.26 });

      $('#halfShow-false-demo').raty({
        halfShow: false,
        score   : 3.26
      });

      $('#half-demo').raty({ half: true });

      $('#starHalf-demo').raty({
        path    : '../client/img',
        half    : true,
        starOff : 'cookie-off.png',
        starOn  : 'cookie-on.png',

        starHalf: 'cookie-half.png'
      });

      $('#round-demo').raty({
        round: { down: .26, full: .6, up: .76 },
        score: 3.26
      });

      $('#click-demo').raty({
        click: function(score, evt) {
          alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
        }
      });

      $('#hints-demo').raty({ hints: ['a', null, '', undefined, '*_*']});

      $('#cancel-demo').raty({ cancel: true });

      $('#cancelHint-demo').raty({
        cancel    : true,
        cancelHint: 'My cancel hint!'
      });

      $('#cancelPlace-demo').raty({
        cancel     : true,
        cancelPlace: 'right'
      });

      $('#star-off-and-star-on-demo').raty({
        path   : '../client/img',
        starOff: 'off.png',
        starOn : 'on.png'
      });

      $('#cancel-off-and-cancel-on-demo').raty({
        path     : null,
        cancel   : true,
        cancelOff: '../client/img/cancel-custom-off.png',
        cancelOn : '../client/img/cancel-custom-on.png',
        starOn   : '../client/img/star-on.png',
        starOff  : '../client/img/star-off.png'
      });

      $('#iconRange-demo').raty({
        path     : '../client/img',
        iconRange: [
          { range: 1, on: '1.png', off: '0.png' },
          { range: 2, on: '2.png', off: '0.png' },
          { range: 3, on: '3.png', off: '0.png' },
          { range: 4, on: '4.png', off: '0.png' },
          { range: 5, on: '5.png', off: '0.png' }
        ]
      });

      $('#size-demo').raty({
        path     : '../client/img',
        cancel   : true,
        cancelOff: 'cancel-off-big.png',
        cancelOn : 'cancel-on-big.png',
        half     : true,
        size     : 24,
        starHalf : 'star-half-big.png',
        starOff  : 'star-off-big.png',
        starOn   : 'star-on-big.png'
      });

      $('#precision-demo').raty({
        path      : '../client/img',
        cancelOff : 'cancel-off-big.png',
        cancelOn  : 'cancel-on-big.png',
        size      : 24,
        starHalf  : 'star-half-big.png',
        starOff   : 'star-off-big.png',
        starOn    : 'star-on-big.png',
        target    : '#precision-hint',
        cancel    : true,
        targetKeep: true,

        precision : true
      });

      $('#space-demo').raty({ space: false });

      $('#single-demo').raty({ single: true });

      $('#function-demo').raty({
        path      : '../client/img',
        cancelOff : 'cancel-off-big.png',
        cancelOn  : 'cancel-on-big.png',
        size      : 24,
        starHalf  : 'star-half-big.png',
        starOff   : 'star-off-big.png',
        starOn    : 'star-on-big.png',
        target    : '#function-hint',
        cancel    : true,
        targetKeep: true,
        precision : true,
        click: function(score, evt) {
          alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
        }
      });

      $('#score-action').on('click', function() {
        $('#function-demo').raty('score', $('#score-function-demo').val());
      });

      $('#click-action').on('click', function() {
        $('#function-demo').raty('click', $('#click-function-demo').val());
      });

      $('#readOnly-action').on('click', function() {
        var isReadOnly = $('#readOnly-function-demo').val() === 'true' ? true : false;

        $('#function-demo').raty('readOnly', isReadOnly);
      });

      $('#cancel-action').on('click', function() {
        var isTrigger = $('#cancel-function-trigger-demo').val() === 'true' ? true : false;

        $('#function-demo').raty('cancel', isTrigger);
      });

      $('#reload-action').on('click', function() {
        $('#function-demo').raty('reload');
      });

      $('#score-get-action').on('click', function() {
        alert('score: ' + $('#function-demo').raty('score'));
      });

      $('#score-set-action').on('click', function() {
        var score = $('#score-set-function-demo').val();

        $('#function-demo').raty('score', score);
      });

      $('#set-action').on('click', function() {
        var options = $('#set-function-demo').val(),
            command = "$('#function-demo').raty('set', " + options + ");";

        eval(command);
      });

      $('#destroy-action').on('click', function() {
        $('#function-demo').raty('destroy');
      });
    });

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-719499234-3']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();