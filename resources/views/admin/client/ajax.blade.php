$.ajax({
    type:"POST",
    url: "{{ route('search') }}",
    data:{
        name :document.getElementById('companies').value,
        _token: document.querySelector("[name='csrf-token']").content
    }
})
    .done(function(rtrn) {
        $('.dropdown').html(rtrn);
    });
