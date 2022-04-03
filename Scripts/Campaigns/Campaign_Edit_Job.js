import { edit_user_campaign } from "../../Requests/Campaigns/CR_Edit/CR_CRE_Edit_User_Campaign.js";

// On create user category
const $edit_btn = $("#edit")
$edit_btn.click(async () => {
    await edit_user_campaign().then((res) => {
        // console.log(res)
    })
})

