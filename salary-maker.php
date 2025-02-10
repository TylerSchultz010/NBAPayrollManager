<h2 style = "padding:0"; class = "text-center">NBA Salary Maker</h2>
<div class="mt-3">
    <label class="form-label">Total Contract (In Millions)</label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" step="0.01" min=0 max=999.99 class="form-control" name="millions" required>
    </div>
</div>
<div class="mt-3">
    <label class="form-label">Total Years</label>
    <select class="form-select " aria-label=".form-select-sm example" name="years" type="number">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>
<div class="mt-3">
    <label class="form-label">Annual Contract Rate</label>
    <select class="form-select " aria-label=".form-select-sm example" name="rate" type="number" step="0.01">
        <option value="1" selected>0% (fixed contract)</option>
        <option value="1.05">5% increase (typical free agent rate)</option>
        <option value="1.08">8% increase (typical extension rate)</option>
        <option value="0.95">5% decrease</option>
        <option value="0.92">8% decrease</option>
    </select>
</div>
<div class="mt-3">
    <button type="submit" class="btn btn-dark">Submit</button>
</div>