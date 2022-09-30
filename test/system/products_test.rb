require "application_system_test_case"

class ProductsTest < ApplicationSystemTestCase
  setup do
    @product = products(:one)
  end

  test "visiting the index" do
    visit products_url
    assert_selector "h1", text: "Products"
  end

  test "should create product" do
    visit products_url
    click_on "New product"

    fill_in "Cod institute", with: @product.cod_institute
    fill_in "Cod senecyt", with: @product.cod_senecyt
    fill_in "Name", with: @product.name
    fill_in "Physical code", with: @product.physical_code
    fill_in "Previous cod", with: @product.previous_cod
    fill_in "Product brand", with: @product.product_brand
    fill_in "Product color", with: @product.product_color
    fill_in "Product condition", with: @product.product_condition
    fill_in "Product description", with: @product.product_description
    fill_in "Product material", with: @product.product_material
    fill_in "Product model", with: @product.product_model
    fill_in "Product serie", with: @product.product_serie
    fill_in "Product type", with: @product.product_type
    click_on "Create Product"

    assert_text "Product was successfully created"
    click_on "Back"
  end

  test "should update Product" do
    visit product_url(@product)
    click_on "Edit this product", match: :first

    fill_in "Cod institute", with: @product.cod_institute
    fill_in "Cod senecyt", with: @product.cod_senecyt
    fill_in "Name", with: @product.name
    fill_in "Physical code", with: @product.physical_code
    fill_in "Previous cod", with: @product.previous_cod
    fill_in "Product brand", with: @product.product_brand
    fill_in "Product color", with: @product.product_color
    fill_in "Product condition", with: @product.product_condition
    fill_in "Product description", with: @product.product_description
    fill_in "Product material", with: @product.product_material
    fill_in "Product model", with: @product.product_model
    fill_in "Product serie", with: @product.product_serie
    fill_in "Product type", with: @product.product_type
    click_on "Update Product"

    assert_text "Product was successfully updated"
    click_on "Back"
  end

  test "should destroy Product" do
    visit product_url(@product)
    click_on "Destroy this product", match: :first

    assert_text "Product was successfully destroyed"
  end
end
