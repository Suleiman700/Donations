import Ajax from '../../HandleRequest.js';

export async function get_campaigns() {
    const table = $('#myTable').DataTable({
        "order": [[0, "desc"]],
        "bDestroy": true
    });

    // Store data into object
    const bodyObj = {
        getCampaigns: true
    }

    // Setup request
    const ajax = new Ajax()
    ajax.controller = "Campaigns_Controller/CC_Get_Campaigns.php"
    ajax.body = bodyObj

    const response = await ajax.asyncAjax()

    const data = response["data"]

    // Clear table
    table.clear().draw();

    // Add rows
    $.each(data, (row) => {
        const id = data[row]["id"]
        const name = data[row]["name"]
        const target = data[row]["target"]
        const start_date = data[row]["start_date"]
        const end_date = data[row]["end_date"]

        if (name) {
            table.row.add([
                id,
                name,
                target,
                start_date,
                end_date,
                `<div class="btn-group align-top">
                    <a href="./edit.php?id=${id}" class="btn btn-primary btn-sm badge edit_category" id="${id}" type="button"><i class="fa fa-edit"></i></a>
                </div>`,
            ]).draw();
        }
    })
}
