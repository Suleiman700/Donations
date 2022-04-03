




import { create_user_category } from "../../Requests/CategoriesRequests/CR_Expense_Category_List/CR_ECL_Create_User_Category.js";
import { get_user_expense_categories } from "../../Requests/CategoriesRequests/CR_Expense_Category_List/CR_ECL_Get_User_Categories.js";
import { edit_user_category, submit_edit_user_category } from "../../Requests/CategoriesRequests/CR_Expense_Category_List/CR_ECL_Edit_User_Category.js";

$(document).ready(() => {
    function get_data() {
        // Get user categories
        get_user_expense_categories().then(async r => {
            await edit_user_category()
        });
    }
    get_data()

    // On create user category
    const $add_btn = $("#add")
    $add_btn.click(async () => {
        await create_user_category().then((res) => {
            if (res) {
                // Refresh table
                get_user_expense_categories();
            }
        })
    })

    // On submit category edit
    $("#editModal #save").click(async () => {
        await submit_edit_user_category().then((res) => {
            if (res) {
                // Refresh table
                get_data()
            }
        })
    })

})
