export default class Ajax {

    constructor() {}

    set body(val) {
        this._body = val
    }
    get body() {
        return this._body
    }

    set controller(val) {
        this._controller = val
    }
    get controller() {
        return this._controller
    }

    asyncAjax() {
        const controller = this._controller
        const body = this._body

        return new Promise(function(resolve, reject) {
            $.ajax({
                url: `../../Controllers/${controller}`,
                type: "POST",
                dataType: "json",
                data: body,
                beforeSend: function() {
                },
                success: function(data) {
                    resolve(data) // Resolve promise and when success
                },
                error: function(err) {
                    reject(err) // Reject the promise and go to catch()
                }
            });
        });
    }
}
