var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function() {
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[0]
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

//targeting the modal-save
$('#modal-save').on('click', function(){
    $.ajax({
        method: 'POST',
        url: url,
        data: { body:  $('#post-body').val(), postId: postId, _token: token }
    })
        .done(function(msg) {
            $(postBodyElement).text(msg['new-body']);
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function(event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
    .done(function() {
        event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
        if (isLike) {
            event.target.nextElementSibling.innerText = 'Dislike';
        } else {
            event.target.previousElementSibling.innerText = 'Like';
        }
    });
});