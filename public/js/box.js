var box = {
    positionId: null,

    add: function(positionId) {
        box.positionId = positionId;
        $('#addBox').modal('show');
    },

    select: function(typeId) {
        // Redirect to add box page
        return window.location.href = '/configuration/dashboard/' + box.positionId + '/' + typeId;
    }
};