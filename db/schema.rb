# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# This file is the source Rails uses to define your schema when running `bin/rails
# db:schema:load`. When creating a new database, `bin/rails db:schema:load` tends to
# be faster and is potentially less error prone than running all of your
# migrations from scratch. Old migrations may fail to apply correctly if those
# migrations use external dependencies or application code.
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema[7.0].define(version: 2022_09_30_022558) do
  create_table "movements", force: :cascade do |t|
    t.integer "product_id", null: false
    t.integer "movement_type"
    t.integer "quantity"
    t.text "comment"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
    t.index ["product_id"], name: "index_movements_on_product_id"
  end

  create_table "products", force: :cascade do |t|
    t.string "name"
    t.string "cod_institute"
    t.string "cod_senecyt"
    t.string "physical_code"
    t.text "previous_cod"
    t.text "product_type"
    t.text "product_serie"
    t.text "product_model"
    t.text "product_color"
    t.text "product_material"
    t.text "product_brand"
    t.text "product_condition"
    t.text "product_description"
    t.datetime "created_at", null: false
    t.datetime "updated_at", null: false
  end

  add_foreign_key "movements", "products"
end
