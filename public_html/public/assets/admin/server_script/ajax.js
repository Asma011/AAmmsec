var server_response;

function Ajax_Request(request_obj,success_obj,failure_onbj)
{
    $.ajax({
        url: request_obj.url,
        type: request_obj.type,
        data: request_obj.data,
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        error:function(request,response){
            console.log(request);
        },
        success: function(response)
        {
            var response = jQuery.parseJSON(response);
            if(response.status == 'success')
            {
                var message = success_obj.message;
                var timeout = (success_obj.time_out) ? success_obj.time_out : 3000 ;
                var reload_flag = (success_obj.reload_flag) ? true : false ;
                message = (response.message) ? response.message : message ;
               success_ajax(message,timeout,reload_flag);
            }
            else if (response.status =='error')
            {
                var message = failure_onbj.message;
                var timeout = (failure_onbj.time_out) ? success_obj.time_out : 3000 ;
                var reload_flag = (failure_onbj.reload_flag) ? true : false ;
                message = (response.message) ? response.message : message ;
               failure_ajax(message,timeout,reload_flag);
            }
            server_response =  response.data ;
        }
    });
}


var notify;
//Alerts
function before_ajax(message,time_out=5000)
{
    notify = $.notify('<strong>Saving</strong> ' + message, {
                    allow_dismiss: false,
                    showProgressbar: true,
                    delay: time_out,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }                  
                }); 
}

function success_ajax(message,time_out=3000,reload_flag=false)
{
    console.log(message);
    setTimeout(function() {
                notify.update({'type':'success', 'message': '<strong>Success</strong> '+ message});
                if(reload_flag)
                {
                    location.reload();
                }
            }, time_out);
}

function failure_ajax(message,time_out=3000,reload_flag=false)
{
    setTimeout(function() {
                notify.update({'type':'danger', 'message': '<strong>Faild</strong> '+ message});
                if(reload_flag)
                {
                    location.reload();
                }
            }, time_out);
}