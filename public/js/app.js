//require('./bootstrap');

function addTag(tagId){
    var form = document.getElementById('newPost');
    var formData = new FormData(form);
    formData.append(tagId, tagId);
    form.append(tagId);
}