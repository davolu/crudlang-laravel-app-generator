$(document).ready(function(){
var nowwidth = $('#single-in > .container').width(),
    checkwidth = 314,
    ilog = false,
    ipass = false,
    ulog = false,
    uemail = false,
    upass = false;
    
    $('#sign-in').click(function(){
        $('#single-in').toggle();
        $('').animate({
            'opacity':'1'
        });
        
        $('#single-in > .close').animate({
            'transform':'translate(0%,0%)'
        });
        
        $('#single-in > .container').animate({
            'transform':'translate(0%,0%)',
            'opacity':'1'
        }, 600, 'easeOutBack');
    });
    
    $('').click(function(){
        $('#single-in > .circle').remove();
        $('#single-in > .transparency').animate({
            'opacity':'0'
        });
        
        $('#single-in > .container').animate({
            'transform':'translate(-100%,0%)',
            'opacity':'0'
        }, 600, 'easeOutBack');
        
        $('#single-in > .close').animate({
            'transform':'translate(0%,-100%)'
        });
        
        setTimeout(function(){
            $('#single-in').toggle();
        },600); 
        
        setTimeout(function(){
            $('#single-in > .container').animate({
                'transform':'translate(100%,0%)',
            }, 10, 'easeOutBack');
            $('#single-in > .container > .open-sign').animate({
            'opacity':'1',
            'transform':'translate(0,0%)'
        }, 10, 'easeInBack');
        },650);
        
    });    
    
    $('#single-in > .close').click(function(){
        $('#single-in > .circle').remove();
        $('#single-in > .transparency').animate({
            'opacity':'0'
        });
        
        $('#single-in > .container').animate({
            'transform':'translate(-100%,0%)',
            'opacity':'0'
        }, 600, 'easeOutBack');
        
        $('#single-in > .close').animate({
            'transform':'translate(0%,-100%)'
        });
        
        setTimeout(function(){
            $('#single-in').toggle();
        },600); 
        
        setTimeout(function(){
            $('#single-in > .container').animate({
                'transform':'translate(100%,0%)',
            }, 10, 'easeOutBack');
            $('#single-in > .container > .open-sign').animate({
            'opacity':'1',
            'transform':'translate(0,0%)'
        }, 10, 'easeInBack');
        },650);
        
    });
    
    $('#single-in > .container > .open-sign').click(function(){
        
        ilog = true;
        
        $('#single-in > .container').animate({
            'width':'2em',
            'height':'2em'
        }, 600, 'easeInBack');
        $('#single-in > .container > .open-sign').animate({
            'opacity':'0',
            'transform':'translate(0,100%)'
        }, 600, 'easeInBack');
        setTimeout(function(){
            $('#single-in').append('<div class="circle"></div>');
        },600);
        setTimeout(function(){
            $('#single-in > .container').animate({
                'width':'20em',
                'height':'5em'
            }, 600, 'easeOutBack');
            $('#single-in > .container > #login').toggle();
        },1350);
        setTimeout(function(){
            $('#single-in > .container > .ok').animate({
                'right':'1em',
                'transform':'rotate(360deg)'
            }, 750, 'easeOutBack');
            
            $('#single-in > .container > .login-label').animate({
                'left':'-3px',
                'transform':'rotate(-360deg)'
            }, 750, 'easeOutBack');
            $('#single-in > .container > #login').focus();
        },1500);
    });
    
    $('#single-in').submit(function (e) {

        var nameLngth = $('#single-in > .container > #login').val().length,
            passLngth = $('#single-in > .container > #password').val().length;
        
        if (ilog){

            e.preventDefault();
            
            if(nameLngth <= 3){
                $('#single-in > .container').addClass('attention');
                setTimeout(function(){
                    $('#single-in > .container').removeClass('attention');
                },600);
                
            } else {
                ilog = false;
                $('#single-in > .container > .login-label').animate({
                    'left':'105%',
                    'transform':'rotate(0deg)'
                }, 750, 'easeInQuart');

                $('#single-in > .container > #login').animate({
                    'transform':'translate(0%,100%)'
                }, 750, 'easeInQuart');
                
                $('#single-in > .container > #password').toggle().animate({
                    'opacity':'1'
                }, 900, 'easeInQuart');

                setTimeout(function(){
                    $('#single-in > .container > .password-label').animate({
                            'left':'-3px',
                            'transform':'rotate(360deg)'
                        }, 750, 'easeOutBack');
                },500);

                if (nowwidth > checkwidth) {
                setTimeout(function(){
                    $('#single-in > .container').animate({
                            'width':'20em',
                            'height':'5em'
                        }, 600, 'easeInBack');
                    },500);
                }

                setTimeout(function(){
                    ipass = true;
                    $('#single-in > .container > #password').focus();
                },250);
            }
            
        }
        
        if (ipass){
            ilog = false;
            if(passLngth <= 0){
                e.preventDefault();
                $('#single-in > .container').addClass('attention');
                setTimeout(function(){
                    $('#single-in > .container').removeClass('attention');
                },600);
                
            } else {
                $('#single-in > .container > .password-label').animate({
                    'left':'105%',
                    'opacity':'0',
                    'transform':'rotate(0deg)'
                }, 750, 'easeInQuart');

                $('#single-in > .container > #password').animate({
                    'transform':'translate(0%,100%)'
                }, 750, 'easeInQuart');

                $('#single-in > .container > #password').animate({
                    'opacity':'0'
                }, 900, 'easeInQuart');
                $('#single-in > .container > .ok').animate({
                    'right':'100%',
                    'opacity':'0',
                    'transform':'rotate(-360deg)'
                }, 750, 'easeInBack');
                
                $('#single-in > .container > .fin-text').animate({
                    'opacity':'1'
                }, 750, 'easeInBack');
                             
                $('#single-in > .container').addClass('off');
                
                var form = this;
                e.preventDefault();
                setTimeout(function () {
                    form.submit();
                }, 2000); // in milliseconds
                
            }
            
        }

    });
    
	$('#single-in > .container> #login').bind('keyup keydown keypres',function(){
		var l=this.value.length;
		l++;
        
        if (l > 10){
            $('#single-in > .container').animate({
                'width': 10+l+'em',
            }, 0, 'easeInBack');
            nowwidth++;
        }
        
		$('#single-in > .container > #login').attr('width',10+l+'em');
	});
        
	$('#single-in > .container> #password').bind('keyup keydown keypres',function(){
		var l=this.value.length;
		l++;
        
        if (l > 10){
            $('#single-in > .container').animate({
                'width': 10+l+'em',
            }, 0, 'easeInBack');
            nowwidth++;
        }
        
		$('#single-in > .container> #password').attr('width',10+l+'em');
	});
    



    $('#sign-up').click(function(){
        $('#single-up').toggle();
        $('#single-up > .transparency').animate({
            'opacity':'1'
        });
        
        $('#single-up > .close').animate({
            'transform':'translate(0%,0%)'
        });
        
        $('#single-up > .container').animate({
            'transform':'translate(0%,0%)',
            'opacity':'1'
        }, 600, 'easeOutBack');
    });
    
    $('#single-up > .transparency').click(function(){
        $('#single-up > .circle').remove();
        $('#single-up > .transparency').animate({
            'opacity':'0'
        });
        
        $('#single-up > .container').animate({
            'transform':'translate(-100%,0%)',
            'opacity':'0'
        }, 600, 'easeOutBack');
        
        $('#single-up > .close').animate({
            'transform':'translate(0%,-100%)'
        });
        
        setTimeout(function(){
            $('#single-up').toggle();
        },600); 
        
        setTimeout(function(){
            $('#single-up > .container').animate({
                'transform':'translate(100%,0%)',
            }, 10, 'easeOutBack');
            $('#single-up > .container > .open-sign').animate({
            'opacity':'1',
            'transform':'translate(0,0%)'
        }, 10, 'easeInBack');
        },650);
        
    });    
    
    $('#single-up > .close').click(function(){
        $('#single-up > .circle').remove();
        $('#single-up > .transparency').animate({
            'opacity':'0'
        });
        
        $('#single-up > .container').animate({
            'transform':'translate(-100%,0%)',
            'opacity':'0'
        }, 600, 'easeOutBack');
        
        $('#single-up > .close').animate({
            'transform':'translate(0%,-100%)'
        });
        
        setTimeout(function(){
            $('#single-up').toggle();
        },600); 
        
        setTimeout(function(){
            $('#single-up > .container').animate({
                'transform':'translate(100%,0%)',
            }, 10, 'easeOutBack');
            $('#single-up > .container > .open-sign').animate({
            'opacity':'1',
            'transform':'translate(0,0%)'
        }, 10, 'easeInBack');
        },650);
        
    });
    
    $('#single-up >.container > .open-sign').click(function(){
        
        ulog = true;
        
        $('#single-up > .container').animate({
            'width':'2em',
            'height':'2em'
        }, 600, 'easeInBack');
        $('#single-up > .container > .open-sign').animate({
            'opacity':'0',
            'transform':'translate(0,100%)'
        }, 600, 'easeInBack');
        setTimeout(function(){
            $('#single-up').append('<div class="circle"></div>');
        },600);
        setTimeout(function(){
            $('#single-up > .container').animate({
                'width':'20em',
                'height':'5em'
            }, 600, 'easeOutBack');
            $('#single-up > .container > #login').toggle();
        },1350);
        setTimeout(function(){
            $('#single-up > .container > .ok').animate({
                'right':'1em',
                'transform':'rotate(360deg)'
            }, 750, 'easeOutBack');
            
            $('#single-up > .container > .login-label').animate({
                'left':'-3px',
                'transform':'rotate(-360deg)'
            }, 750, 'easeOutBack');
            $('#single-up > .container > #login').focus();
        },1500);
    });
    
    $('#single-up').submit(function (e) {

        var nameLngthu = $('#single-up > .container > #login').val().length,
            passLngthu = $('#single-up > .container > #password').val().length,
            emailLngthu = $('#single-up > .container > #email').val().length;
        if (ulog){

            e.preventDefault();
            
            if(nameLngthu <= 3){
                $('#single-up > .container').addClass('attention');
                setTimeout(function(){
                    $('#single-up > .container').removeClass('attention');
                },600);
                $('#single-up > .container > #login').focus();
                
            } else {
                ulog = false;
                $('#single-up > .container > .login-label').animate({
                    'left':'105%',
                    'transform':'rotate(0deg)'
                }, 750, 'easeInQuart');

                $('#single-up > .container > #login').animate({
                    'transform':'translate(0%,100%)'
                }, 750, 'easeInQuart');
                
                $('#single-up > .container > #email').toggle().animate({
                    'opacity':'1'
                }, 900, 'easeInQuart');

                setTimeout(function(){
                    $('#single-up > .container > .email-label').animate({
                            'left':'-3px',
                            'transform':'rotate(360deg)'
                        }, 750, 'easeOutBack');
                },500);

                if (nowwidth > checkwidth) {
                setTimeout(function(){
                    $('#single-up > .container').animate({
                            'width':'20em',
                            'height':'5em'
                        }, 600, 'easeInBack');
                    },500);
                }

                setTimeout(function(){
                    uemail = true;
                    $('#single-up > .container > #email').focus();
                },250);
            }
            
        }
        
        if (uemail){
            
            e.preventDefault();
            
            if(emailLngthu <= 6){
                $('#single-up > .container').addClass('attention');
                setTimeout(function(){
                    $('#single-up > .container').removeClass('attention');
                },600);
                $('#single-up > .container > #email').focus();
                
            } else {
                uemail = false;
                $('#single-up > .container > .email-label').animate({
                    'left':'105%',
                    'transform':'rotate(0deg)'
                }, 750, 'easeInQuart');

                $('#single-up > .container > #email').animate({
                    'transform':'translate(0%,100%)'
                }, 750, 'easeInQuart');
                
                $('#single-up > .container > #password').toggle().animate({
                    'opacity':'1'
                }, 900, 'easeInQuart');

                setTimeout(function(){
                    $('#single-up > .container > .password-label').animate({
                            'left':'-3px',
                            'transform':'rotate(360deg)'
                        }, 750, 'easeOutBack');
                },500);

                if (nowwidth > checkwidth) {
                setTimeout(function(){
                    $('#single-up > .container').animate({
                            'width':'20em',
                            'height':'5em'
                        }, 600, 'easeInBack');
                    },500);
                }

                setTimeout(function(){
                    upass = true;
                    $('#single-up > .container > #password').focus();
                },250);
            }
            
        }
        
        if (upass){
            uemail = false;
            if(passLngthu <= 5){
                e.preventDefault();
                $('#single-up > .container').addClass('attention');
                setTimeout(function(){
                    $('#single-up > .container').removeClass('attention');
                },600);
                $('#single-up > .container > #password').focus();
                
            } else {
                $('#single-up > .container > .password-label').animate({
                    'left':'105%',
                    'opacity':'0',
                    'transform':'rotate(0deg)'
                }, 750, 'easeInQuart');

                $('#single-up > .container > #password').animate({
                    'transform':'translate(0%,100%)'
                }, 750, 'easeInQuart');

                $('#single-up > .container > #password').animate({
                    'opacity':'0'
                }, 900, 'easeInQuart');
                $('#single-up > .container > .ok').animate({
                    'right':'100%',
                    'opacity':'0',
                    'transform':'rotate(-360deg)'
                }, 750, 'easeInBack');
                
                $('#single-up > .container > .fin-text').animate({
                    'opacity':'1'
                }, 750, 'easeInBack');
                             
                $('#single-up > .container').addClass('off');
                
                var form = this;
                e.preventDefault();
                setTimeout(function () {
                 //   form.submit();
                }, 2000); // in milliseconds
                
            }
            
        }

    });
    
	$('#single-up > .container> #login').bind('keyup keydown keypres',function(){
		var l=this.value.length;
		l++;
        
        if (l > 10){
            $('#single-up > .container').animate({
                'width': 10+l+'em',
            }, 0, 'easeInBack');
            nowwidth++;
        }
        
		$('#single-up > .container > #login').attr('width',10+l+'em');
	});
        
	$('#single-up > .container> #email').bind('keyup keydown keypres',function(){
		var l=this.value.length;
		l++;
        
        if (l > 10){
            $('#single-up > .container').animate({
                'width': 10+l+'em',
            }, 0, 'easeInBack');
            nowwidth++;
        }
        
		$('#single-up > .container> #email').attr('width',10+l+'em');
	});  
    
	$('#single-up > .container> #password').bind('keyup keydown keypres',function(){
		var l=this.value.length;
		l++;
        
        if (l > 10){
            $('#single-up > .container').animate({
                'width': 10+l+'em',
            }, 0, 'easeInBack');
            nowwidth++;
        }
        
		$('#single-up > .container> #password').attr('width',10+l+'em');
	});
    
});