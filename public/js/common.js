$(document).ready(function() {
    deleteRecordByAjax = (url, moduleName, tableId) => {
        Swal.fire({
            title: "Are you sure?",
            text: `You will not be able to recover this ${moduleName}!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete.value) {
                axios.delete(url).then((response) => {
                    if (response.data.status) {
                        window.LaravelDataTables[tableId].ajax.reload(null, false)
                        if (response.data.type === 'warning') {
                            toastr.warning(response.data.message);
                        } else {
                            toastr.success(response.data.message);
                        }
                    } else {
                        toastr.error(response.data.message);
                    }
                }).catch((error) => {
                    console.log(error);
                    
                    let data = error.response.data
                    toastr.error(data.message);
                });
            }
        })
    }

    changeStatusByAjax = (url, tableId, id) => {
        axios.post(url, { id: id }).then((response) => {
            if (response.data.status) {
                if (response.data.type === 'warning') {
                    window.LaravelDataTables[tableId].ajax.reload(null, false)
                    toastr.warning(response.data.message);
                } else {
                    toastr.success(response.data.message);
                }
            } else {
                toastr.error(response.data.message);
            }
        }).catch((error) => {
            console.log(error);
            
            let data = error.response.data
            toastr.error(data.message);
        });
           
    }
});