#include "popupdeleteboarder.h"
#include "ui_popupdeleteboarder.h"
#include "rents.h"

PopUpDeleteBoarder::PopUpDeleteBoarder(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::PopUpDeleteBoarder)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/ddd");
    ui->label_2->setPixmap(pix);
}

PopUpDeleteBoarder::~PopUpDeleteBoarder()
{
    delete ui;
}

void PopUpDeleteBoarder::on_pushButton_clicked()
{
    Rents *r=new Rents;
    this->hide();
    r->show();
}
