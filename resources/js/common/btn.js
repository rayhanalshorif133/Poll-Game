getButtons = (name, id) => {
    let buttons = `
            <div class="btn-group" id=${name}-${id}>
                <a href="${name}/${id}/view" class="btn btn-sm btn-outline-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="${name}/${id}/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-pen" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-sm btn-outline-danger deleteBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                `;
    return buttons;
}
