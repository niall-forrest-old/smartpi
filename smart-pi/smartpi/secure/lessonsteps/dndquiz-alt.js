
        //Drag and Drop Quiz
        //jquery code for drag and drop functionality
        $(document).ready(function() {
            //initialize the quiz options
            var answersRemaining = [];
            $('.quiz-wrapper1').find('li.option').each(function(i) {
                var $this = $(this);
                var answerValue = $this.data('target');
                var $target = $('.answers .target[data-accept="' + answerValue + '"]');
                var labelText = $this.html();

                //jquery draggable function
                $this.draggable({
                    revert: "invalid",
                    containment: ".quiz-wrapper1"
                });

                if ($target.length > 0) {
                    $target.droppable({
                        accept: 'li.option[data-target="' + answerValue + '"]',
                        drop: function(event, ui) {
                            $target.droppable('destroy');
                            $this.draggable('destroy');
                            $this.html('&nbsp;');
                            $target.html(labelText);
                            answersRemaining.splice(answersRemaining.indexOf(answerValue), 1);
                        }
                    });
                    answersRemaining.push(answerValue);
                } else {}
            });

            $('.quiz-wrapper1 button[type="submit"]').click(function() {
                //if there are remainijng answers, warn the user. Click to return to quiz.
                if (answersRemaining.length > 0) {
                    $('.lb-bg').show();
                    $('.status.deny').show();
                    $('.lb-bg').click(function() {
                        $('.lb-bg').hide();
                        $('.status.deny').hide();
                        $('.lb-bg').unbind('click');
                    });

                    $('.status').click(function() {
                        $('.lb-bg').hide();
                        $('.status.deny').hide();
                        $('.lb-bg').unbind('click');
                    });
                } else {
                    //if there are no remaining answers, display message and allow user to progress to next step
                    $('.lb-bg').show();
                    $('.lb-bg').unbind('click');
                    $('.status.confirm').show();
                    $('#nextstep').show();
                }
            });
        });