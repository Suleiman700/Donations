import Ajax from '../../HandleRequest.js';

export async function get_user_income_categories() {
    const table = $('#myTable').DataTable({
        "order": [[0, "desc"]],
        "bDestroy": true
    });

    // Store data into object
    const bodyObj = {
        category_type: "income"
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Categories_Controller/CC_Get_User_Categories.php"
    ajax.body = bodyObj

    const response = await ajax.asyncAjax()
    const data = response["data"]

    // Clear table
    table.clear().draw();

    // Add rows
    $.each(data, (row) => {
        const category_id = data[row]["id"]
        const category_name = data[row]["name"]

        if (category_name) {
            table.row.add([
                category_id,
                category_name,
                `<div class="btn-group align-top">
                <button class="btn btn-sm btn-primary badge edit_category" id="${category_id}" type="button">Edit</button>
                <button class="btn btn-sm btn-primary badge" type="button"><i class="fa fa-trash"></i></button>
            </div>`,
            ]).draw();
        }
    })
}
