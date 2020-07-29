//Call to action text for WPBOT plugin
jQuery(function ($) {
    $(document).ready(function(){
        if ($("#wp-chatbot-chat-container").length){
            var ctaMsg = 'Quieres consultar algo? Escríbenos';
            var ctaContent = '<div id="wpb-call-to-action" class="animated bounceInRight visible">' + '<div class="wpb-call-to-action-btn">' + '</div>' + '<div class="wpb-call-to-action-content">' + ctaMsg + '</div>' + '</div>';
            var audioElement = document.createElement('audio');
            var templateUrl = ajax_object.templateUrl + '/audio/pop-up-sound.wav';
            audioElement.setAttribute('src', templateUrl);
            // $.get();
            function createSVG() {
                var svgURI = 'http://www.w3.org/2000/svg';
                var svg = document.createElementNS(svgURI, 'svg');
                svg.setAttribute('viewBox', '0 0 24 24');
                var path = document.createElementNS(svgURI, 'path');
                path.setAttribute('fill', '#fff');
                path.setAttribute('d', 'M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z');
                svg.appendChild(path);
                return svg;
            }
            //Display CTA message after 5 seconds of page load if chat board not active:
            setTimeout(function(){
                $('#wp-chatbot-integration-container').prepend(ctaContent);
                $('#wp-chatbot-integration-container').css('display', 'block');
                $('.wpb-call-to-action-btn').append(createSVG());
                setTimeout(function(){
                    audioElement.play();
                }, 400);
            }, 3000);
            //Close CTA message on svg mouse click:
            $(document).on("click", '#wpb-call-to-action', function() {
                $(this).removeClass('bounceInRight').addClass('bounceOutRight');
                // $(this).css('display', 'none');
            });
            //Change chatbot ball & container css display and autoclose CTA message on message mouse click:
            $('#wp-chatbot-ball').click(function() {
                $('#wpb-call-to-action').css('display', 'none');
                $(this).css('float', 'none');
                $('#wp-chatbot-ball-container').css('float', 'none');
                $('.wp-chatbot-ball').css('margin-top', '10px');
                
            });
        }
    });
})