// För CRUD-möjligheter med wp-databasen
class saveWork {
    constructor() {
        this.events();
    }

    // Event för knappar som startar metoder
    events() {
        // Radera arbete 
        $(".deleteWork").on("click", this.deleteWork);

        // Inköpslistan
        $("#myBuy").on("click", ".deleteBuy", this.deleteBuy);
        $("#myBuy").on("click", ".editBuy", this.editBuy.bind(this));
        $("#myBuy").on("click", ".updateBuy", this.updateBuy.bind(this));
        $(".createBuy").on("click", this.createBuy.bind(this));
    }


    ///// Administrera inköpslistan  ////////////////////////////////////////////////////////////////////

    // Metod för att radera från inköpslistan
    deleteBuy(e) { 
        if (confirm("Vill du verkligen radera?")) {
            var thisBuy = $(e.target).parents("li");
            $.ajax({
                beforeSend: (xhrr) => { // xhrr är en egen påhittad parameter som skickas med
                    xhrr.setRequestHeader('X-WP-Nonce', workData.nonce); // Number used once
                }, // setRequestHeader används för att skicka med mer information i anropet
                url: workData.root_url + '/wp-json/wp/v2/buy/' + thisBuy.data('id'),
                type: 'DELETE',
                success: (response) => {
                    thisBuy.slideUp(); // jQuery-design 
                    console.log("Varan raderades!");
                    console.log(response);
                },
                error: (response) => {
                    console.log("Det misslyckades!")
                    console.log(response);
                }
            });
        }
    }

    // Metod för att uppdatera inköpslistan
    editBuy(e) { 
        var thisBuy = $(e.target).parents("li");
        if (thisBuy.data("state") == "editable") {
            // ReadOnly
            this.makeBuyReadOnly(thisBuy);
        } else {
            // Går att redigera
            this.makeBuyEditable(thisBuy);
        }
    }

    // Metod för att göra innehållet möjligt att redigera
    makeBuyEditable(thisBuy) {
        thisBuy.find(".editBuy").html('<i class="fa fa-times" aria-hidden="true"></i> ')
        thisBuy.find(".buyTitle").removeAttr("readonly").addClass("editBuyPossible");
        thisBuy.find(".updateBuy").addClass("updateBuyVisible");
        thisBuy.data("state", "editable");
    }

    // Metod för att göra read-only 
    makeBuyReadOnly(thisBuy) {
        thisBuy.find(".editBuy").html('<i class="fa fa-pencil" aria-hidden="true"></i> ')
        thisBuy.find(".buyTitle").attr("readonly", "readonly").removeClass("editBuyPossible");
        thisBuy.find(".updateBuy").removeClass("updateBuyVisible");
        thisBuy.data("state", "cancel");
    }



    // För att spara uppdatering efter redigering 
    updateBuy(e) { 
        var thisBuy = $(e.target).parents("li");

        var updatedBuy = {
            'title': thisBuy.find(".buyTitle").val(),
        }

        $.ajax({
            beforeSend: (xhrr) => {
                xhrr.setRequestHeader('X-WP-Nonce', workData.nonce); // Number used once
            },
            url: workData.root_url + '/wp-json/wp/v2/buy/' + thisBuy.data('id'),
            type: 'POST',
            data: updatedBuy,
            success: (response) => {
                this.makeBuyReadOnly(thisBuy);
                console.log("Varan uppdaterades!");
                console.log(response);
            },
            error: (response) => {
                console.log("Det misslyckades!")
                console.log(response);
            }
        });

    }

    // Metod för att skapa nya inlägg i inköpslistan 
    createBuy(e) { 
        var newBuy = {
            'title': $(".newTitle").val(),
            'status': 'publish',
        }

        $.ajax({
            beforeSend: (xhrr) => {
                xhrr.setRequestHeader('X-WP-Nonce', workData.nonce); // Number used once
            },
            url: workData.root_url + '/wp-json/wp/v2/buy/',
            type: 'POST',
            data: newBuy,
            success: (response) => {
                $(".newTitle").val('');
                $(`
                <li data-id="${response.id}">
                <button class="updateBuy"><i class="fa fa-arrow-right" aria-hidden="true"></i> Spara</button><br/>
                <input readonly class="buyTitle" value="${response.title.raw}"> 
                <button class="editBuy"><i class="fa fa-pencil" aria-hidden="true"></i> </button>
                <button class="deleteBuy"><i class="fa fa-trash-o" aria-hidden="true"></i> </button><br/><br/><br/>
                </li>
                `).prependTo("#myBuy").hide().slideDown();
                console.log("Varan lades till!");
                console.log(response);
            },
            error: (response) => {
                console.log("Det misslyckades!")
                console.log(response);
            }
        });

    }





















    ///// Radera arbeten //////////////////////////////////////////////////////////////////////////////

    // Metod för att radera innehåll från min post_type "work" från front-end
    deleteWork(event) {
        var thisWork = $(event.target).parents("li");
        if (confirm("Vill du verkligen radera?")) {

            // jQuery Ajax (kontrollera request)
            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', workData.nonce);
                },
                url: workData.root_url + '/wp-json/wp/v2/work/' + thisWork.data('id'),
                type: 'DELETE',
                success: (response) => {
                    // thisWork.slideUp();
                    // Skriv ut vid lyckat anrop
                    console.log("Det lyckades!");
                    console.log(response);
                    location.reload();
                },
                error: (response) => {
                    // Vid misslyckat anrop 
                    console.log("Det misslyckades tyvärr!");
                    console.log(response);
                    location.reload();

                }
            });
        }
    }

}

var savework = new saveWork();