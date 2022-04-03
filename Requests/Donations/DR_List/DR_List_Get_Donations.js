import Ajax from '../../HandleRequest.js';

export async function get_donations() {
    const table = $('#myTable').DataTable({
        "order": [[0, "desc"]],
        "bDestroy": true
    });

    // Store data into object
    const bodyObj = {
        get_donations: true
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Donations_controller/DC_Get_Donations.php"
    ajax.body = bodyObj

    const response = await ajax.asyncAjax()

    const data = response["data"]

    // Clear table
    table.clear().draw();

    // Add rows
    $.each(data, (row) => {
        const id = data[row]["id"]
        const campaign = data[row]["campaign"]
        const name = data[row]["name"]
        const phone = data[row]["phone"]
        const added_by = data[row]["added_by"]
        const amount = data[row]["amount"]
        const date = data[row]["date"]
        const received_by = data[row]["received_by"]

        if (campaign) {
            table.row.add([
                id,
                campaign,
                name,
                phone?phone:"-",
                amount,
                date.split("-").reverse().join("-"),
                received_by,
                `<div class="btn-group align-top">
                    <a href="./edit.php?id=${id}" class="btn btn-primary btn-sm badge edit_category" id="${id}" type="button"><i class="fa fa-edit"></i></a>
                </div>`,
            ]).draw();
        }
    })
}
