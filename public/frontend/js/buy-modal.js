"user strict";

function fetchProductOrderView() {
    return {
        modelOpen: false,
        url: "",
        productPrice: "0",
        updatedPrice: 0,
        renderedHtml: "",
        fetchView() {
            fetch(`${this.url}`)
                .then((response) => response.text())
                .then((data) => {
                    this.renderedHtml = data;
                })
                .catch((err) => console.log("ERROR", err));

            this.updatedPrice = Number(this.productPrice).toFixed(3);
        },
        updatePrice(event) {
            this.updatedPrice = (Number(this.productPrice) * Number(event.target.value)).toFixed(3);
        },
        closeModal() {
            this.modelOpen = false;
            this.url = "";
            this.productPrice = "0";
            this.updatedPrice = 0;
            this.renderedHtml = "";
        },
    };
}



