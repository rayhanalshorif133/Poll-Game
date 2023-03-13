handleDeleteBtn = (urlName) => {
    console.log('handleDeleteBtn', urlName);
    $(document).on("click", ".deleteBtn", function (event) {
        var removeRow = $(this).closest('tr');
        var id = $(this).closest('div').attr('id').split('-')[1];
        var url = "/" + urlName + "/" + id + "/delete";
        deleteItem(url, removeRow);
    });
}


deleteItem = (url, removeRow = null, reload = false) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(url)
                .then((response) => {
                    Toast.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    // Remove row
                    if (removeRow) {
                        $(removeRow).remove();
                    }
                    if (reload) {
                        location.reload();
                    }
                });
        } else {
            Toast.fire(
                'Cancelled!',
                'Your file is safe :)',
                'error'
            );
        }
    });
    return true;
}
