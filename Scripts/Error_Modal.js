export default class ErrorModal {

    constructor(modalClass, modalBody) {
        this._class = modalClass
        this._body = modalBody
    }

    showModal() {
        const $modal = $(`#errorModal`)
        $modal.modal('show')
        $(`#errorModal #modalBody`).html(this._body)

    }
}
