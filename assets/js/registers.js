$(() => {
  $("#gridContainer").dxDataGrid({
    dataSource: DevExpress.data.AspNet.createStore({
      key: "id",
      loadUrl: `/users/get_users`,
      updateUrl: `/users/update`,
      updateMethod: `POST`,

      deleteUrl: `/users/delete`,
      deleteMethod: "POST",

      insertUrl: `/users/store`,
      insertMethod: "POST",
    }),

    editing: {
      mode: "row",
      allowUpdating: ert,
      allowDeleting: ert,
      allowAdding: ert,
    },

    columns: [
      {
        dataField: "id",
        allowEditing: false,
      },
      "nombre",
      "apellido",
      "email",
      "contrasena",

      {
        dataField: "estado",
        caption: "Estado",
        lookup: {
          dataSource: states,
          displayExpr: "state",
          valueExpr: "id",
        },
      },
      {
        dataField: "created_at",
        allowEditing: false,
      },
      {
        type: "buttons",
        buttons: [
          {
            text: "Nuevo Pago",
            onClick(e) {
              const key = new DevExpress.data.Guid().toString();
              window.location.href = '/payments/add/' + e.row.data.id;
            },
            visible({ row }) {
              return !row.isEditing;
            },
          },
          "add",
          "edit",
          "delete",
        ],
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
