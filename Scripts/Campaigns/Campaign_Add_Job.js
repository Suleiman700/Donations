import { create_user_campaign } from "../../Requests/Campaigns/CR_Add/CR_CRA_Create_User_Campaign.js";

// On create user category
const $add_btn = $("#add")
$add_btn.click(async () => {
    await create_user_campaign().then((res) => {
        // console.log(res)
    })
})

