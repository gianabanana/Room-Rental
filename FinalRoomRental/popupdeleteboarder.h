#ifndef POPUPDELETEBOARDER_H
#define POPUPDELETEBOARDER_H

#include <QWidget>

namespace Ui {
class PopUpDeleteBoarder;
}

class PopUpDeleteBoarder : public QWidget
{
    Q_OBJECT

public:
    explicit PopUpDeleteBoarder(QWidget *parent = 0);
    ~PopUpDeleteBoarder();

private slots:
    void on_pushButton_clicked();

private:
    Ui::PopUpDeleteBoarder *ui;
};

#endif // POPUPDELETEBOARDER_H
