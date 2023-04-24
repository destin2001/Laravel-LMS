<tr>
    <<td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <p class="text-xs text-secondary mb-0"><%= obj.id %></p>
        </div>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.book_issue_id %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.book_name %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.student_id %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.student_name %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.issued_at %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <button type="button" class="btn btn-outline-danger student-status my-2" disabled><%= obj.return_time %></button>
    </td>
</tr>

