export default class RequestAlerts {

    constructor(code, text, fadeTime = "99999", elmID = "#alert") {
        this._code = code
        this._text = text
        this._fadeTime = fadeTime
        this._elmID = $(`${elmID}`)
    }

    // Set alert class
    setAlertClass() {
        const code = this._code
        let class_name


        // Check if code starts with error or warning identifier
        if (code.startsWith("E-")) class_name = "alert-danger"
        else if (code.startsWith("W-")) class_name = "alert-warning"
        else if (code.startsWith("I-")) class_name = "alert-info"
        else if (code.startsWith("S-")) class_name = "alert-success"
        else class_name = "alert-success"

        return class_name
    }

    // Set alert text
    setAlertText() {
        const text = this._text
        return text
    }


    showAlert() {
        const class_name = this.setAlertClass()
        const alert_text = this.setAlertText()

        const $alert = this._elmID
        $alert.slideDown("fast")
        $alert.removeClass("alert-danger")
        $alert.removeClass("alert-warning")
        $alert.removeClass("alert-success")
        $alert.removeClass("alert-info")
        $alert.addClass(class_name)
        $alert.html(alert_text)

        // Auto fade alert based on settings
        this.fadeAlert()
    }

    fadeAlert() {
        const $alert = this._elmID
        const timer = this._fadeTime

        setTimeout(() => {
            $alert.slideUp("fast")
        }, timer);
    }

    hideAlert() {
        const $alert = this._elmID
        $alert.slideUp("fast")
    }
}
