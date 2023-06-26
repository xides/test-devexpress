/** TABLE */
$(() => {
  $("#gridContainer").dxDataGrid({
    dataSource: DevExpress.data.AspNet.createStore({
      key: "id",
      loadUrl: `/payments/get/${current_id}`,
      updateUrl: `/payments/update`,
      updateMethod: `POST`,

      deleteUrl: `/payments/delete`,
      deleteMethod: "POST",

      insertUrl: `/payments/store`,
      insertMethod: "POST",
    }),

    editing: {
      mode: "row",
      allowUpdating: ert,
      allowDeleting: ert,
    },

    columns: [
      {
        dataField: "id",
        allowEditing: false,
      },
      {
        dataField: "usuario",
        allowEditing: false,
      },

      {
        dataField: "tipo_id",
        caption: "Tipo",
        lookup: {
          dataSource: pago_tipos,
          displayExpr: "pago",
          valueExpr: "id",
        },
      },

      `cantidad`,
      `monto_a_pagar`,
      //`fecha_a_pagar`, YMD -> DMa
      {
        dataField: 'fecha_a_pagar',
        dataType: 'date',
        width: 125,
      },
      `comentarios`,

      {
        dataField: "created_at",
        allowEditing: false,
      },
      {
        type: "buttons",
        buttons: ["edit", "delete"],
      },
    ],
  });
});

const discountCellTemplate = function (container, options) {
  $("<div/>")
    .dxBullet({
      onIncidentOccurred: null,
      size: {
        width: 150,
        height: 35,
      },
      margin: {
        top: 5,
        bottom: 0,
        left: 5,
      },
      showTarget: false,
      showZeroLevel: true,
      value: options.value * 100,
      startScaleValue: 0,
      endScaleValue: 100,
      tooltip: {
        enabled: true,
        font: {
          size: 18,
        },
        paddingTopBottom: 2,
        customizeTooltip() {
          return { text: options.text };
        },
        zIndex: 5,
      },
    })
    .appendTo(container);
};

let collapsed = false;

/** FORM */
const formData = {
  Email: "A@ASD.COM",
  Password: "A",
  Name: "A",
  Date: null,
  Address: "A",
  Phone: "707070707077",
};
$(() => {
  const sendRequest = function (value) {
    const invalidEmail = "test@dx-email.com";
    const d = $.Deferred();
    setTimeout(() => {
      d.resolve(value !== invalidEmail);
    }, 1000);
    return d.promise();
  };

  const changePasswordMode = function (name) {
    const editor = formWidget.getEditor(name);
    editor.option(
      "mode",
      editor.option("mode") === "text" ? "password" : "text"
    );
  };

  const formWidget = $("#form")
    .dxForm({
      formData,
      readOnly: false,
      showColonAfterLabel: true,
      showValidationSummary: true,
      validationGroup: "customerData",
      items: [
        {
          itemType: "group",
          items: [
            {
              dataField: "id_user",
              visible: false,
            },
            {
              dataField: "Tipo",
              editorType: "dxSelectBox",

              valueExpr: "id",
              displayExpr: "pago",

              editorOptions: {
                valueExpr: "id",
                displayExpr: "pago",

                items: pago_tipos,
                searchEnabled: false,
                value: "id",
              },
              validationRules: [
                {
                  type: "required",
                  message: "Requerido",
                },
              ],
            },
            {
              dataField: "Cantidad",
              validationRules: [
                {
                  type: "required",
                  message: "Campo requerido",
                },
                {
                  type: "numeric",
                  message: "Cantidad requerida",
                },
              ],
            },
            {
              dataField: "Monto a pagar",
              validationRules: [
                {
                  type: "required",
                  message: "Campo requerido",
                },
                {
                  type: "numeric",
                  message: "Cantidad requerida",
                },
              ],
            },
            {
              dataField: "Fecha a pagar",
              editorType: "dxDateBox",
              label: {
                text: "Fecha",
              },
              editorOptions: {
                invalidDateMessage:
                  "The date must have the following format: MM/dd/yyyy",
              },
              validationRules: [
                {
                  type: "required",
                  message: "Fecha es requerida",
                },
              ],
            },
            {
              dataField: "Comentarios",
              editorType: "dxTextArea",
              label: {
                text: "",
              },
            },
          ],
        },

        {
          itemType: "button",
          horizontalAlignment: "left",
          buttonOptions: {
            text: "Guardar",
            type: "success",
            useSubmitBehavior: true,
          },
        },
      ],
    })
    .dxForm("instance");
  /*
$("#form-container").on("submit", (e) => {
  console.log( e );
  DevExpress.ui.notify(
    {
      message: "You have submitted the form",
      position: {
        my: "center top",
        at: "center top",
      },
    },
    "success",
    3000
  );

  e.preventDefault();
});
*/
});
