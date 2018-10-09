#include "popupeditboardersave.h"
#include "ui_popupeditboardersave.h"
#include "rents.h"

PopUpEditBoarderSave::PopUpEditBoarderSave(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::PopUpEditBoarderSave)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/ddd");
    ui->label_2->setPixmap(pix);
}

PopUpEditBoarderSave::~PopUpEditBoarderSave()
{
    delete ui;
}

void PopUpEditBoarderSave::on_pushButton_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
