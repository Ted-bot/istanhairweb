        const searchField = document.querySelector('#search');
        

        searchField.addEventListener('input', youtubeApiCall);

        function ajaxJS(url, callback){
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                if (xhr.readyState==4 && xhr.status==200){
                    callback(JSON.parse(xhr.responseText))
                }   
            }
            xhr.open('GET',url, true);
            xhr.send();
        }

            function youtubeApiCall(){
                $.ajax({
                    cache: false,
                    data: $.extend({
                        key: api_key,
                        q: $('#search').val(),
                        channelId: channel_Id,
                        part: 'snippet'
                    }, {
                        maxResults: 10
                    }),
                    dataType: 'json',
                    type: 'GET',
                    timeout: 5000,
                    url: 'https://youtube.googleapis.com/youtube/v3/search?'
                }).done(function(data) {
                    // $('.btn-group').show();
                    if (typeof data.items[0] === 0) {
                        $("#result").hide();
                        alert('items in json not found')
                    } else {
                        $("#result").show();
                    }
                    var items = data.items,
                        videoList = "";
                    $.each(items, function(index, e) {
                        videoList = videoList + '<li><div><a href="" class="hyv-content-link" title="' + e.snippet.title + '"><span class="title">' + e.snippet.title + '</span><span class="stat attribution">by <span>' + e.snippet.channelTitle + '</span></span></a></div><div class="hyv-thumb-wrapper"><a href="" class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="' + e.snippet.title + '" src="' + e.snippet.thumbnails.default.url + '" width="120" height="90"></span></a></div></li>';
                    });
                    $("#result").html(videoList);
                    // JSON Responce to display for user 	 
                    new PrettyJSON.view.Node({
                        data: data
                    });
                });
            }

        function updateValue() {
            
            let search = document.querySelector('#search').value;
            let result = document.querySelector('#result');

            const api_key = 'AIzaSyCpKdUrxMvLMcFT2XEG0XRYzE3PMjEURlc';
            
            const link = 'https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=10&q=';

            let url = link + search + '&key=' + api_key;
            ajaxJS(url, function(data){
                for (var x in data.items){
                  console.log(data.items[x]);  
                  let title = data.items[x].snippet.title;
                  let videoId = data.items[x].id.videoId;
                  let thumb = data.items[x].snippet.thumbnails.default.url;
                  result.innerHTML += '<div>'+title+ '<br>' +videoId+ '<br>' +thumb+ '</div';
                }
            })
            
            
        }
    
