<h2 style = "padding:0"; class = "text-center">NBA Tax Calculator</h2>
<div class="mt-3">
    <label class="form-label">Total Payroll</label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="text" value=140588000 min=0 max=1000000000 class="form-control" style="appearance: textfield;"name="payroll" required>
    </div>
</div>
<div class="mt-3">
    <label class="form-label">Is the team a repeating tax offender</label>
    <select class="form-select " aria-label=".form-select-sm example" name="repeater" type="text">
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
    </select>
</div>
<div class="mt-3">
    <button type="submit" class="btn btn-dark">Submit</button>
</div>